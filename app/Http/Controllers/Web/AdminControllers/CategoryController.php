<?php

namespace App\Http\Controllers\Web\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Validator;


class CategoryController extends Controller
{
    public $SUCCESS_STATUS      =   100 ; // all fine
    public $VALIDATION_ERROR    =   101 ; // some error in validation
    public $FALIURE_STATUS      =   102 ; // faliure status
    public $DATA_NOT_FOUND      =   104 ; //if all set but no data found

    //return search user page view
    public function index()
    {
        //get news from news table
        $category = Category::orderBy('created_at','desc')->paginate(10);
        return view('Admin/Category/search_category')->with('category',$category);
        
    }

    //search user in category table
    public function search(Request $request)
    {
        
        if (!empty($request->category_id)) 
        {

            //get data from category table
            $category = Category::where('categori_id', 'LIKE', '%' . $request->categori_id . '%')->get();
            return view('Admin/category/search_category')->with('category',$category);

        }
        else if(!empty($request->restaurant_id))
        {

            //get data from category table
            $category = Category::where('restaurant_id',$request->restaurant_id)->get();
            return view('Admin/category/search_category')->with('category',$category);

        }
        else if(!empty($request->category_name))
        {

            //get data from Category table
            $category = Category::where('category_name',$request->category_name)->get();
            return view('Admin/category/search_category')->with('category',$category);

        }


        else
        {

            return view('Admin/category/search_category')->with('category',array());

        }
        
        
    }

    public function add(Request $request)
    {
        echo ('hello');
        
        // if(!empty(session('user_id')))
        // {
        //     try
        //     {
        //         //check if user already exist
        //         $isexist    =   Category::where('category_id', $request->category)->first();
        //         if(empty($isexist))
        //         {
        //             $category = Category::create($request->all());
        //             return response()->json(['status' =>$this->SUCCESS_STATUS, 'Category'=> $category]);
        //         }
        //         else
        //         {
        //             return response()->json(['status' =>$this->FALIURE_STATUS, 'message'=> 'category already exists']);
        //         }
        //     }
        //     catch(\Illuminate\Database\QueryException $e)
        //     {
        //         return response() -> json(['status' => $this ->FALIURE_STATUS, 'message' => $e -> getPrevious()]);
        //     }
        // }
        // else
        // {
        //     echo ('hello');
        // }
    }

    public function update(Request $request,$user_id)
    {
        $this->validate($request,
        [
            'category'         => 'required',
        ]);

        try{

            //update user in users table
            Category::where('id', $user_id)
            ->update([
            'category_name'         => $request->category_name
            ]);
            return redirect()->route('search.restaurant');
        }catch(\Exception $exception){
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
