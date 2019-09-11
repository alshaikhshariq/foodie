<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Str;
use App\Models\Login;
use App\Models\Restaurant;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public $SUCCESS_STATUS      =   100 ; // all fine
    public $VALIDATION_ERROR    =   101 ; // some error in validation
    public $FALIURE_STATUS      =   102 ; // faliure status
    public $DATA_NOT_FOUND      =   104 ; //if all set but no data found

    public function index ()
    {
        return view('Login/login');
    }

    public function login (Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        try
        {
             $isvalid = Restaurant::where('email'    ,$request->input('email'))
                                    ->first();
            
             if(Hash::check($request->input('password'), $isvalid->password)){
                session(['restaurant_id'=> $isvalid->id]);
                return view ('Restaurants/dashboard');
              }else{
                return back()->withError('user not valid');
               }
        }
        catch(Exception $exception)
        {
            return back()->withError($exception->getMessage())-withInput();
        }
    }
}