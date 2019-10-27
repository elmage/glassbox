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
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
});


Route::group(['namespace'=>'Agent', 'prefix'=> "agent"], function (){
    Route::post('/create', 'AgentController@create');
    Route::get('/', 'AgentController@index');
    Route::post('/verify', 'AgentController@verify');
    Route::post('/decline', 'AgentController@decline');
});


