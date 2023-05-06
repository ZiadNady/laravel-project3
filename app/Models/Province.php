<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }   

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
