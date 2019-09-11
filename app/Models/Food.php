<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //make array of fillable fields
    protected $fillable = [


        
        'restaurant_id', 
        'food_title',
        'food_price', 
        'is_customized',
        'meta_data',
        'category_id',
    ];
}
