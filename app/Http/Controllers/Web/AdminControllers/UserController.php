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

    //return search user page view
    public function index()
    {
        //get news from news table
        $user = User::orderBy('created_at','desc')->paginate(10);
        return view('Admin/User/search_user')->with('user',$user);
        
    }

    public function search(Request $request)
    {
        // if (empty($request->first_name) || ($request->email_address) || ($request->phone_number)) 
        // {
        //     return request('type to search')->with();
        // }
        if (!empty($request->first_name)) {
            //get data from user table
            $user = User::where('first_name', 'LIKE', '%' . $request->first_name . '%')->get();
            return view('Admin/User/search_user')->with('user',$user);
        }

        else if(!empty($request->email_address)){
            //get data from user table
            $user = User::where('email_address',$request->email_address)->get();
            return view('Admin/User/search_user')->with('user',$user);
        }

        else if(!empty($request->phone_number)){
            //get data from user table
            $user = User::where('phone_number',$request->phone_number)->get();
            return view('Admin/User/search_user')->with('user',$user);
        }

        else{
            return view('Admin/User/search_user')->with('user',array());
        }
        
        
    }
}
