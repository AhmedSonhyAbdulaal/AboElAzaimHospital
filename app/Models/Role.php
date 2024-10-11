<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role_type'];


    public function workShops() :BelongsToMany
    {
        return $this->belongsToMany(WorkShop::class, 'nationalities_roles_prices_work_shops', 'role_id', 'work_shop_id')->wherePivot('price_id','nation_id');
    }
    public function nationalities() :BelongsToMany
    {
        return $this->belongsToMany(nationality::class, 'nationalities_roles_prices_work_shops', 'role_id', 'nation_id')->wherePivot('price_id','work_shop_id');
    }
    public function prices() :BelongsToMany
    {
        return $this->belongsToMany(Price::class, 'nationalities_roles_prices_work_shops', 'role_id', 'price_id')->wherePivot('nation_id','work_shop_id');
    }

    public function attendees() :HasMany
    {
        return $this->hasMany(Attendee::class, 'role_id');
    }
}
