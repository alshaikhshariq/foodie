<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'order_id',
        'food_id',
        'order_quantity', 
    ];
}
