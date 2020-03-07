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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['as' => 'admin.'], function () {
        Route::patch('/location/{id}', 'HomeController@updateLocation')->name('location.update');
        Route::resource('clients', 'ClientController');
        Route::resource('drivers', 'DriverController');
        Route::resource('orders', 'OrderController');
    });
});

Route::get('apidoc', function () {
    return view('apidoc.index');
})->name('apidoc');
