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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['as' => 'admin.'], function () {
        Route::resource('clients', 'ClientController');
        Route::resource('drivers', 'DriverController');
        Route::resource('orders', 'OrderController');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
