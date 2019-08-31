<?php

namespace App\Http\Controllers\Web\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //public $FAILURE_STATUS = 102 ;

    //return search restaurant page view
    public function index()
    {
        //get news from news table
        $user = User::orderBy('created_at','desc')->paginate(2);
        return view('Admin/User/search_user')->with('user',$user);
        
    }

    public function add()
    {
        return view('Admin/User/add_user');
    }


}
