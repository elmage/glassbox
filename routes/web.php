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

Route::group(['namespace'=>'Auth'], function () {
    //Views
    Route::get('/login', 'LoginController@showLoginForm');

    //Apis
    Route::group(['prefix' => 'api'], function () {
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout');
    });
});
