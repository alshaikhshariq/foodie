<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'title', 
        'email', 
        'contact', 
        'password',
        'description', 
        'minimum_order', 
        'delivery_fee', 
        'delivery_time',
        'open_time', 
        'close_time',
        'image_path', 
        'image_name' ,
        'badge', 
        'latitude', 
        'longitude',
        'isblock'
    ];
}
