<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Order;
use App\Models\Order_Details;

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

    public function createOrder(Request $request)
    {
        $validator = validator::make($request->all(),
        [
            //'user_id'               => 'required',
            //ERROR: user_id doesn't have a default value
            'restaurant_id'         => 'required',
            'order_status'          => 'required',
            'order_quantity'        => 'required',
            'delivery_address'      => 'required',
            //'is_discounted'         => 'required',
            'total_price'           => 'required',
            'special_instructions'  => 'required',

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
                $inOrder        =   Order::where('order_id', $request->order_id)->first();
                //$inOrderDetails =   Order_Details::where('order_id', $request->order_id)->first();
                //if(empty($inOrder) && empty($inOrderDetails))
                if(empty($inOrder))
                {
                    $order = Order::create($request->all());

                    return response()->json(['status' =>$this->SUCCESS_STATUS, 'Order'=> $order]);
                }
                else
                {
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
