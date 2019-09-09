<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    public $table = "foods";
    public $timestamps = false;
   
    protected $fillable = [

        'food_title', 
        'food_price', 
        'category_name', 
        'category_id',
        'restaurant_id', 
        
    ];
}
