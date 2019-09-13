<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Food;
use App\Models\Rating;
use App\Models\Review;
use App\Models\OrderDetail;

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
            'user_id'               => 'required',
            'restaurant_id'         => 'required',
            'order_status'          => 'required',
            'delivery_address'      => 'required',
            'is_discounted'         => 'required',
            'total_price'           => 'required',
            'special_instructions'  => 'required',

        ]);
        
        if($validator->fails())
        {
            return response()->json(['status' =>$this->VALIDATION_ERROR, 'error'=>$validator->errors()]);
        }
        
        $inOrder     =   Order::where('order_id', $request->order_id)->first();
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

    public function createOrderDetails(request $request)
    {
        $validator = validator::make($request->all(),
        [
            'order_id'              => 'required',
            'food_id'               => 'required',
            'order_quantity'        => 'required',
        ]);
        
        if($validator->fails())
        {
            return response()->json(['status' =>$this->VALIDATION_ERROR, 'error'=>$validator->errors()]);
        }
        
        $inOrderDetail  =   OrderDetail::where('order_details_id', $request->order_details_id)->first();
        if(empty($inOrderDetail))
        {
        $orderdetail = OrderDetail::create($request->all());
        return response()->json(['status' =>$this->SUCCESS_STATUS, 'OrderDetail'=> $orderdetail]);
        }
        else
        {
        return response()->json(['status' =>$this->FALIURE_STATUS, 'message'=> 'user already exists']);
        }
    }

    public function createRatings(Request $request)
    {
        $validator = validator::make($request->all(),
        [
            'user_id'              => 'required',
            'restaurant_id'        => 'required',
            'rating'        => 'required',
        ]);
        
        if($validator->fails())
        {
            return response()->json(['status' =>$this->VALIDATION_ERROR, 'error'=>$validator->errors()]);
        }
        
        $inRating  =   Rating::where('rating_id', $request->rating_id)->first();
        if(empty($inRating))
        {
        $rating = Rating::create($request->all());
        return response()->json(['status' =>$this->SUCCESS_STATUS, 'OrderDetail'=> $rating]);
        }
        else
        {
        return response()->json(['status' =>$this->FALIURE_STATUS, 'message'=> 'user already exists']);
        }  
    }

    public function createReview(Request $request)
    {
        $validator = validator::make($request->all(),
        [
            'user_id'              => 'required',
            'restaurant_id'        => 'required',
            'review'        => 'required',
        ]);
        
        if($validator->fails())
        {
            return response()->json(['status' =>$this->VALIDATION_ERROR, 'error'=>$validator->errors()]);
        }
        
        $inReview  =   Review::where('id', $request->id)->first();
        if(empty($inReview))
        {
        $review = Review::create($request->all());
        return response()->json(['status' =>$this->SUCCESS_STATUS, 'Review'=> $review]);
        }
        else
        {
        return response()->json(['status' =>$this->FALIURE_STATUS, 'message'=> 'user already exists']);
        }  
    }
}
