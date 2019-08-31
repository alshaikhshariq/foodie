<?php

namespace App\Http\Controllers\Web\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    public $FAILURE_STATUS = 102 ;

    //return search restaurant page view
    public function index()
    {
        //get news from news table
        $restaurant = Restaurant::orderBy('created_at','desc')->paginate(2);
        return view('Admin/Register/search_restaurant')->with('restaurant',$restaurant);
        
    }

    //return add restaurant page view
    public function add()
    {
        return view('Admin/Register/add_restaurant');
    }

    //store restaurant in restaurants table & return all restaurant page view
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title'         => 'required',
            'email'         => 'bail|required|unique:restaurants',
            'contact'       => 'bail|required|numeric|unique:restaurants',
            'description'   => 'required',
            'minimum_order' => 'required|numeric',
            'delivery_fee'  => 'required|numeric',
            'delivery_time' => 'required',
            'open_time'     => 'required',
            'close_time'    => 'required',
            'longitude'     => 'bail|required|numeric|between:-9999999999.99999999999,9999999999.99999999999',
            'latitude'      => 'bail|required|numeric|between:-9999999999.99999999999,9999999999.99999999999',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //email verification for restaurant
        try{
            $password = Str::random(8);
            $data = array('email'=>$request->input('email'),'password'=>$password);
            Mail::send('EmailTemplate/sendpassword', $data, function($message) 
            {
                  $message->to('muhammadwaqas51578@gmail.com', 'Foodie')->subject
                  ('Login Details');
                  $message->from('mwaqasiu@gmail.com','Foodie Team');
            });

            // check for failures if mail not sent
            if (Mail::failures()) 
            {
                return back()->withError('email not sent please check credentials')->withInput();
            }
            else
            {
                $profile_image = $request->file('image');
                if(isset($profile_image)){
                $image_name = $profile_image->getClientOriginalName();
                $image_name = str_replace(" ","_",$image_name);
                $image_path = 'upload/restaurantImages/';
                $profile_image->move(public_path($image_path),$image_name);
            }
    
                $restaurant = new Restaurant();
                $restaurant->title          = $request->input('title');
                $restaurant->email          = $request->input('email');
                $restaurant->contact        = $request->input('contact');
                $restaurant->password       = bcrypt($password);
                $restaurant->description    = $request->input('description');
                $restaurant->minimum_order  = $request->input('minimum_order');
                $restaurant->delivery_fee   = $request->input('delivery_fee');
                $restaurant->delivery_time  = $request->input('delivery_time');
                $restaurant->open_time      = $request->input('open_time');
                $restaurant->close_time     = $request->input('close_time');
                $restaurant->image_path     = $image_path;
                $restaurant->image_name     = $image_name;
                $restaurant->badge          = $request->input('badge');
                $restaurant->latitude       = $request->input('latitude');
                $restaurant->longitude      = $request->input('longitude');
                $restaurant->save();
                return redirect()->route('search.restaurant');   
            }
        }
        catch(\Exception $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    //return edit restaurant page view
    public function edit($user_id)
    {
        $restaurant = Restaurant::where('id',$user_id)->first();
        return view('Admin/Register/edit_restaurant')->with('restaurant',$restaurant);
    }


    public function update(Request $request,$user_id)
    {
        $this->validate($request,
        [
            'title'         => 'required',
            'description'   => 'required',
            'minimum_order' => 'required|numeric',
            'delivery_fee'  => 'required|numeric',
            'delivery_time' => 'required',
            'open_time'     => 'required',
            'close_time'    => 'required',
            'longitude'     => 'bail|required|numeric|between:-9999999999.99999999999,9999999999.99999999999',
            'latitude'      => 'bail|required|numeric|between:-9999999999.99999999999,9999999999.99999999999'

            //important
           // 'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        try{

            //update user in users table
            Restaurant::where('id', $user_id)
            ->update([
            
            'title'         => $request->title,
            'description'   => $request->description,
            'minimum_order' => $request->minimum_order,
            'delivery_fee'  => $request->delivery_fee,
            'delivery_time' => $request->delivery_time,
            'open_time'     => $request->open_time,
            'close_time'    => $request->close_time,
            'longitude'     => $request->longitude,
            'latitude'      => $request->latitude,
        
            ]);
            return redirect()->route('search.restaurant');
        }catch(\Exception $exception){
            return back()->withError($exception->getMessage())->withInput();
        }
    }


    public function search(Request $request)
    {

        if (!empty($request->title)) {
            //get data from restaurant table
            $restaurant = Restaurant::where('title', 'LIKE', '%' . $request->title . '%')->get();
            return view('Admin/Register/search_restaurant')->with('restaurant',$restaurant);
        }

        if(!empty($request->email)){
            //get data from restaurant table
            $restaurant = Restaurant::where('email',$request->email)->get();
            return view('Admin/Register/search_restaurant')->with('restaurant',$restaurant);
        }

        if(!empty($request->contact)){
            //get data from restaurant table
            $restaurant = Restaurant::where('contact',$request->contact)->get();
            return view('Admin/Register/search_restaurant')->with('restaurant',$restaurant);
        }
        
        
    }

}