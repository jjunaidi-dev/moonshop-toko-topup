<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_id',
        'game_name',
        'user_id',
        'zone_id',
        'package_name',
        'total_price',
        'payment_method',
        'status',
        'snap_token',
    ];

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}