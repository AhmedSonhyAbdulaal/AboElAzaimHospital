<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkShop extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function prices() :BelongsToMany
    {
        return $this->belongsToMany(Price::class, 'nationalities_roles_prices_work_shops', 'work_shop_id', 'price_id')->wherePivot('nation_id','role_id');
    }
    public function nationalities() :BelongsToMany
    {
        return $this->belongsToMany(nationality::class, 'nationalities_roles_prices_work_shops', 'work_shop_id', 'nation_id')->wherePivot('price_id','role_id');
    }
    public function roleTypes() :BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'nationalities_roles_prices_work_shops', 'work_shop_id', 'role_id')->wherePivot('price_id','nation_id');
    }
    public function bookings() :BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'bookings_workk_spops', 'work_shop_id', 'booking_id');
    }
}
