<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nationality extends Model
{
    use HasFactory;
    protected $fillable = ['nation'];


    public function getRouteKeyName()
    {
        return 'nation';
    }


    public function workShops() :BelongsToMany
    {
        return $this->belongsToMany(WorkShop::class, 'nationalities_roles_prices_work_shops', 'nation_id', 'work_shop_id')->wherePivot('price_id','role_id');
    }
    public function roleTypes() :BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'nationalities_roles_prices_work_shops', 'nation_id', 'role_id')->wherePivot('price_id','work_shop_id');
    }
    public function prices() :BelongsToMany
    {
        return $this->belongsToMany(Price::class, 'nationalities_roles_prices_work_shops', 'nation_id', 'price_id')->wherePivot('role_id','work_shop_id');
    }

    public function attendees() :HasMany
    {
        return $this->hasMany(Attendee::class, 'nation_id');
    }
}
