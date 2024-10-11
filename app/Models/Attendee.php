<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory;
    protected $fillable =['name','email','tel','nation_id','role_id'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function nationality() :BelongsTo
    {
        return $this->belongsTo(nationality::class,'nation_id');
    }
    public function roleType() :BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
