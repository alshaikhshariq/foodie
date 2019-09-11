<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () 
{
    return view('Welcome');
});



//routes for admin
Route::resource ('admindashboard'               ,'Web\AdminControllers\DashboardController');

Route::get      ('/searchrestaurant'            ,'Web\AdminControllers\RegisterController@index')       ->name('search.restaurant');
Route::get      ('/search_user'                 ,'Web\AdminControllers\UserController@index')           ->name('search.user');
Route::get      ('/search_category'             ,'Web\AdminControllers\CategoryController@index')       ->name('search.category');
Route::get      ('/login_view'                  ,'Web\LoginController@index')                           ->name('login_view.user');

Route::get      ('/addrestaurant'               ,'Web\AdminControllers\RegisterController@add')         ->name('add.restaurant');
Route::get      ('/adduser'                     ,'Web\AdminControllers\UserController@add')             ->name('add.user');
Route::get      ('/addcategory'                 ,'Web\AdminControllers\CategoryController@add')         ->name('add.category');

Route::post     ('/createcategory'              ,'Web\AdminControllers\CategoryController@create')      ->name('create.category');
Route::post     ('/createrestaurant'           ,'Web\AdminControllers\RegisterController@create')       ->name('create.restaurant');

Route::get      ('/editrestaurant/{user_id}'    ,'Web\AdminControllers\RegisterController@edit')        ->name('edit.restaurant');

Route::put      ('/updaterestaurant/{user_id}'  ,'Web\AdminControllers\RegisterController@update')      ->name('update.restaurant');

Route::get      ('/findrestaurant'              ,'Web\AdminControllers\RegisterController@search')      ->name('find.restaurant');
Route::get      ('/find_user'                   ,'Web\AdminControllers\UserController@search')          ->name('find.user');

Route::post     ('/login'                       ,'Web\LoginController@login')                           ->name('login.user');

Route::post     ('/search_order'                ,'web\AdminControllers\RegisterController@search')      ->name('order.restaurant');

//add food route

Route::get('/addfood','Web\AdminControllers\RegisterController@add_food')->name('add.food');

//Route::post('/create_food','Web\AdminControllers\RegisterController@create_food')->name('.food');


Route::post('/createfood','Web\AdminControllers\RegisterController@create_food')->name('create.food');

//edit food route
Route::get('/editfood/{food_id}','Web\AdminControllers\RegisterController@edit_food')->name('edit.food');

//update food route
Route::put('/updatefood/{food_id}','Web\AdminControllers\RegisterController@update_food')->name('update.food');

//search food route
Route::get('/searchfood','Web\AdminControllers\RegisterController@foodindex')->name('search.food');

//find food route
Route::get('/findfood','Web\AdminControllers\RegisterController@search_food')->name('find.food');

//get food route
Route::get('/getfood','Web\AdminControllers\RegisterController@get_food')->name('get.food');

Route::get('/deletefood/{food_id}','Web\AdminControllers\RegisterController@delete_food')->name('delete.food');

//routes for restaurants
Route::resource('restaurantdashboard','Web\RestaurantControllers\DashboardController');
