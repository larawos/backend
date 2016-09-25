<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $token = Storage::uploadToken('0e9797dfd582ab05742628c70772860d.jpg');
    dd($token);
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('{group?}/{module?}/{frist?}/{second?}', 'DashboardController@index');
});

Route::group([], function() {
    Route::resource('user', 'DashboardController');
});
