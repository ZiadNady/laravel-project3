<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'order_status',
        'order_total',
        'shipping_date',
        'pharmacy_id',
        'user_id',
        'prescription_code',
        'prescription_status',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
