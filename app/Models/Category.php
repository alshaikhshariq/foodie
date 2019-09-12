<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'restaurant_id',
        'category_name', 
    ];
}
