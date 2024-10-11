<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkShopRelation\Store;
use App\Http\Resources\WorkShopRelation\Index;
use App\Models\Nationality;
use App\Models\Price;
use App\Models\Role;
use App\Models\WorkShop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class WorkShopRelationController extends Controller
{
    public function index ()
    {
        $validated = request()->validate([
            'role_type' => ['required', 'string',Rule::exists('roles','role_type')],
            'nationality' => ['required', 'string',Rule::exists('nationalities','nation')],
        ]);
        $role = Role::where('role_type',$validated['role_type'])->first();
        $nationality = Nationality::where('nation',$validated['nationality'])->first();
        return response()->json([
            'date' => Index::collection(DB::select('select price_id,work_shop_id from nationalities_roles_prices_work_shops where nation_id = ? and role_id = ?',[$nationality->id,$role->id])),
        ],200);
    }

    public function store (Store $request)
    {
        try {
            WorkShop::where('name',$request['workshop'])->first()
            ->roleTypes()->attach(Role::where('role_type',$request['role_type'])->first()->id,[
                'nation_id'=>Nationality::where('nation',$request['nationality'])->first()->id,
                'price_id'=>$request['price'],
            ]);
            return response()->json(['data' => 'created successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['data' => 'can not create this nationality.'],422);
        }
    }

    // public function update(Update $request , WorkShop $workShop)
    // {
    //     try {
    //         $workShop->update($request->validated());
    //         return response()->json(['data' => 'updated successfully.'],200);
    //     } catch (Exception $e) {
    //         return response()->json(['data' => 'can not update this workShop.'],422);
    //     }
    // }
    // public function delete(WorkShop $workShop)
    // {
    //     try {
    //         $workShop->delete();
    //         return response()->json(['data' => 'deleted successfully.'],200);
    //     } catch (Exception $e) {
    //         return response()->json(['data' => 'can not delete this workShop.'],422);
    //     }
    // }
}
