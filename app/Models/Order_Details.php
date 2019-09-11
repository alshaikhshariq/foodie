<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'order_quantity',
        'special_instructions', 
    ];
}
