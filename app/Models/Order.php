<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'user_id',
        'restaurant_id',
        'order_status',
        'order_quantity',
        'delivery_address',
        'is_discounted',
        'total_price',
        'special_instructions', 
    ];

    protected $primaryKey   =   'order_id'; 
}
