<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;
    protected $fillable =['conferance','transaction_images','attendee_id'];

    public function getImagesAttribute()
    {
        $images = [];
        if(isset($this->attributes['transaction_images']) && !is_null($this->attributes['transaction_images'])) {
            $imgs = json_decode($this->attributes['transaction_images'] );
            foreach($imgs as $img) {
                $images[] = asset($img);
            }
        }
        return $images;
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function workShops() :BelongsToMany
    {
        return $this->belongsToMany(WorkShop::class, 'bookings_workk_spops', 'booking_id', 'work_shop_id');
    }
}
