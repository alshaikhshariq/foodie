<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth/v1'], function () 
{
    Route::post     ('login'        , 'AuthController@login');
    Route::post     ('signup'       , 'AuthController@signup');
    Route::post     ('addUser'      , 'Api\ApiController@addUser');
    Route::post     ('createOrder'  , 'Api\ApiController@createOrder');
    Route::post     ('createOrderDetails'  , 'Api\ApiController@createOrderDetails');

    //Route::post     ('addCategory'  , 'Api\ApiController@addCategory');

    Route::group    (['middleware'  => 'auth:api'], function() 
    {
        Route::get  ('logout'       , 'AuthController@logout');
        Route::get  ('user'         , 'AuthController@user');
    });
});



