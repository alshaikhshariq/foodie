<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  
    // make array of fillable fields
    protected $fillable = [
        'email',
        'password', 
    ];
}
