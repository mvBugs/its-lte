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

Route::post('/login', 'Api\AuthController@login');
Route::get('/logout', 'Api\AuthController@logout');

Route::post('order/create', 'Api\OrderController@create');
Route::get('orders', 'Api\OrderController@index')->middleware('api-auth');
Route::post('order/confirm', 'Api\OrderController@confirm')->middleware('api-auth');
Route::get('driver/balance', 'Api\AuthController@user')->middleware('api-auth');
Route::get('user/order/{id}', 'Api\OrderController@userOrder');
Route::get('order/cancel/{id}', 'Api\OrderController@cancel');


Route::post('intercity-order/create', 'Api\IntercityOrderController@store');
Route::get('intercity-order/cancel/{id}', 'Api\IntercityOrderController@cancel');
Route::get('intercity-orders/{type}', 'Api\IntercityOrderController@getOrders');
Route::get('intercity-order/{id}', 'Api\IntercityOrderController@show');

Route::get('cities', 'Api\IntercityOrderController@getCities');
