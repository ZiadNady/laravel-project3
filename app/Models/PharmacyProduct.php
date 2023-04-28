<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyProduct extends Model
{
    use HasFactory;

    protected $table = 'pharmacy_products';

    protected $fillable = [
        'price',
        'quantity',
        'expiration_date',
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
