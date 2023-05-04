<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'mobile_number',
        'province_id',
        'district_id',
        'gender',
        'country_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(UserOrder::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }


    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class);
    // }
}
