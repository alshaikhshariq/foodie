<?php

namespace App\Http\Controllers\Web\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Str;
use App\Models\Order;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public $SUCCESS_STATUS      =   100 ; // all fine
    public $VALIDATION_ERROR    =   101 ; // some error in validation
    public $FALIURE_STATUS      =   102 ; // faliure status
    public $DATA_NOT_FOUND      =   104 ; //if all set but no data found

    //return search user page view
    public function index()
    {
        //get news from news table
        $order = Order::orderBy('created_at','desc')->paginate(10);
        return view('Admin/Order/search_order')->with('order',$order);
        
    }
}
