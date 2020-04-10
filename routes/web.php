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

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['as' => 'admin.'], function () {
        Route::patch('/location/{id}', 'HomeController@updateLocation')->name('location.update');
        Route::patch('/price/{id}', 'HomeController@updatePrice')->name('price.update');
        Route::get('/price/{id}', 'HomeController@editPrice')->name('price.edit');
        Route::resource('clients', 'ClientController');
        Route::resource('drivers', 'DriverController');
        Route::resource('orders', 'OrderController');
        Route::get('intercity-orders', 'OrderController@intercityOrders')->name('intercity.orders');
        Route::delete('intercity-orders/{id}', 'OrderController@intercityDestroy')->name('intercity-orders.destroy');
    });
});

Route::view('apidoc', 'apidoc.index')->name('apidoc');
