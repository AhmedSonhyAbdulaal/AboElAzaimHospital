<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Price extends Model
{
    use HasFactory;
    protected $fillable =['price','symbol','currancy'];

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

    public function workShops() :BelongsToMany
    {
        return $this->belongsToMany(WorkShop::class, 'nationalities_roles_prices_work_shops', 'price_id', 'work_shop_id')->wherePivot('nation_id','role_id');
    }
    public function nationalities() :BelongsToMany
    {
        return $this->belongsToMany(nationality::class, 'nationalities_roles_prices_work_shops', 'price_id', 'nation_id')->wherePivot('role_id','work_shop_id');
    }
    public function roleTypes() :BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'nationalities_roles_prices_work_shops', 'price_id', 'role_id')->wherePivot('nation_id','work_shop_id');
    }
}
