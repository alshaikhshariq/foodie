<?php

namespace App\Http\Controllers\Web\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //return dashboard page view
    public function index()
    {
        return view('Admin/dashboard');
    }
}
