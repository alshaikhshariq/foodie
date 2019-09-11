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
Route::post     ('/add'                         ,'Web\AdminControllers\CategoryController@add')         ->name('add.category');

Route::post     ('/storerestaurant'             ,'Web\AdminControllers\RegisterController@store')       ->name('register.restaurant');

Route::get      ('/editrestaurant/{user_id}'    ,'Web\AdminControllers\RegisterController@edit')        ->name('edit.restaurant');

Route::put      ('/updaterestaurant/{user_id}'  ,'Web\AdminControllers\RegisterController@update')      ->name('update.restaurant');

Route::get      ('/findrestaurant'              ,'Web\AdminControllers\RegisterController@search')      ->name('find.restaurant');
Route::get      ('/find_user'                   ,'Web\AdminControllers\UserController@search')          ->name('find.user');

Route::post     ('/login'                        ,'Web\LoginController@login')                           ->name('login.user');

Route::post     ('/search_order'                ,'web\AdminControllers\RegisterController@search')      ->name('order.restaurant');
//routes for restaurants
Route::resource('restaurantdashboard','Web\RestaurantControllers\DashboardController');
