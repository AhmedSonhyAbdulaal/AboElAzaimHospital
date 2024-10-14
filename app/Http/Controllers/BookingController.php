<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\Store;
use App\Http\Requests\BookingVisit;
use App\Mail\BookingNotification;
use App\Models\Attendee;
use App\Models\Booking;
use App\Models\Nationality;
use App\Models\Price;
use App\Models\Role;
use App\Models\WorkShop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        // return booking with the attendee and workshops
    }
    public function store(Store $request)
    {   
        // those keys used to loaded in the data array sent to email class
        $imgsPathArrayKey = "imgsPath"; // represents the array of images path 
        $priceArrayKey = "price"; // represents the total price in this booking
        // get workshop ids from names
        $requestedWorkShops = WorkShop::whereIn('nameEN',
            array_map(fn($item)=>$item['name'],$request->workShops)
        )->get();
        $isRequestedWorkShopsPrimary = $requestedWorkShops->pluck('is_primary')->sum() > 0;

        DB::beginTransaction();
        try {
            $Attendee = Attendee::where('email', $request->email)->first();
            // out if no primary chosen for first registration
            if(!$isRequestedWorkShopsPrimary && is_null($Attendee))
                return $this->jsonMSG('when you submit for the first time you must book the conferance.',442);
            // out if he take all before
            if(in_array(2,$requestedWorkShops->pluck('id')->toArray()) && count($requestedWorkShops->pluck('id')->toArray())>1)
                return $this->jsonMSG('you cant book all option with anther one.',442);
            if(in_array(2,$requestedWorkShops->pluck('id')->toArray())) 
                if(($Attendee??false) && ($Attendee->bookings->first()??false))
                    return $this->jsonMSG('you cant book all option, you already have  before booking.',442);
            // out if try book primary and already have one 
            if($isRequestedWorkShopsPrimary && ($Attendee??false))
                return $this->jsonMSG('you already booking for the conferance.',442);
            // get attendee with relation
            $A = $Attendee?->with(['bookings','bookings.workShops'])->get();
            // get only workshop ids as array
            $WS_all = $A?->flatMap(fn ($a) =>
                $a->bookings->flatMap(fn ($b) =>
                    $b->workShops->where('id',2)->pluck('id'))
            )->unique()->values()->sum();
            if($isRequestedWorkShopsPrimary && ($Attendee??false) && $WS_all)
                return $this->jsonMSG('you already booking all package.',442);

            $Attendee ??= Attendee::create($request->only(['name','email','tel'])+[
                'role_id'=>Role::where('role_type',$request->role)->first()->id,
                'nation_id'=>Nationality::where('nation',$request->nationality)->first()->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->jsonMSG('can not store this attendee.',442);
        }
        try {
            // check for image
            // create image
            $filePath = [];
            if(count($request->file('images')??[])>0){
                foreach($request->file('images') as $f) {
                    if($f->isValid()) {
                        $filePath[] = $f->store('PayImages', 'public'); 
                    }
                }
            }
            // create booking
            // $Booking = Booking::create($request->only(['conferance'])+['transaction_images'=>$filePath, 'attendee_id'=>$Attendee->id]);
            $Booking = $Attendee->bookings()->create(['transaction_images'=>json_encode($filePath)]);
            // attach workshops to booking
            $Booking->workShops()->attach($requestedWorkShops->pluck(['id'])->toArray());
        } catch (Exception $e) {
            DB::rollBack();
            return $this->jsonMSG('can not store images you uploaded.',442);
        }
        try {
            // create work shops
            // get attendee with relation
            $TheAttendee = $Booking->attendee()->with(['bookings.workShops'])->get();
            // get only workshop ids as array
            $workShops_id = $TheAttendee->flatMap(fn ($a) =>
                $a->bookings->flatMap(fn ($b) =>
                    $b->workShops->pluck('id'))
            )->unique()->values()->all();
            // get array of assigned price to attendee
            // first get price ids as array
            $totalPrice = Price::whereIn('id',DB::table('nationalities_roles_prices_work_shops')
                ->where('nation_id',$Attendee->nationality->id)
                ->where('role_id',$Attendee->roleType->id)
                ->whereIn('work_shop_id',$workShops_id)
                ->pluck('price_id')->all()
            )->get('price')->pluck('price')->sum();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->jsonMSG('workshops not found.',442);
        }
        try {
            // send email
            Mail::mailer('smtp')->to(config('mail.MAIL_TO_ADDRESS_DEFAULT'))
            ->send(new BookingNotification($request->validated()+[$imgsPathArrayKey=>$Booking->images]+[$priceArrayKey=>$totalPrice]+['attendee'=>$TheAttendee]));
        } catch (Exception $e) {
            DB::rollBack();
            return $this->jsonMSG('sending email notification error for this process.',442);
        }
        DB::commit();
        return $this->jsonMSG('Booking successfully.');
    }

    private function jsonMSG($message, $status = 200)
    {
        return response()->json(['data' => $message],$status);
    }
}
