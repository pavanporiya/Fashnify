<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'total',
        'status',
        'estimated_delivery',
        'payment_method'
        
    ];

    // 🔗 USER RELATION
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 ORDER ITEMS RELATION
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}