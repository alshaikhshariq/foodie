<?php

namespace App\Http\Controllers\Web\RestaurantControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    //return dashboard page view
    public function index()
    {
        return view('Restaurants/dashboard');
    }
}
