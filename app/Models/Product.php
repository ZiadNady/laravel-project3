<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'product_name',
        'product_code',
        'image',
        'time_sold',
        'drug_type',
        'company',
        'slug'
    ];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class)
            ->using(PharmacyProduct::class)
            ->withPivot('price', 'quantity', 'expiration_date')
            ->withTimestamps();
    }
}
