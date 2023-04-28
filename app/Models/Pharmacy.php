<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_name',
        'country_id',
        'district_id',
        'province_id',
        'active',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(PharmacyProduct::class)
            ->withPivot('price', 'quantity', 'expiration_date')
            ->withTimestamps();
    }
}
