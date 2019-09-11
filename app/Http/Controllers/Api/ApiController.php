<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use App\Models\Category;


class ApiController extends Controller
{
    public $SUCCESS_STATUS      =   100 ; // all fine
    public $VALIDATION_ERROR    =   101 ; // some error in validation
    public $FALIURE_STATUS      =   102 ; // faliure status
    public $DATA_NOT_FOUND      =   104 ; //if all set but no data found

    public function addUser(Request $request)
    {
        $validator = validator::make($request->all(),
        [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email_address' => 'required',
            'password'      => 'required',
            'phone_number'  => 'required'

        ]);

        if($validator->fails())
        {
            return response()->json(['status' =>$this->VALIDATION_ERROR, 'error'=>$validator->errors()]);
        }
        else
        {
            try
            {
                //check if user already exist
                $isexist    =   User::where('email_address', $request->email_address)->first();
                if(empty($isexist))
                {
                    $users = User::create($request->all());
                    return response()->json(['status' =>$this->SUCCESS_STATUS, 'User'=> $users]);
                }else{
                    return response()->json(['status' =>$this->FALIURE_STATUS, 'message'=> 'user already exists']);
                }
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                return response() -> json(['status' => $this ->FALIURE_STATUS, 'message' => $e -> getPrevious()]);
            }
        }
    }


}
