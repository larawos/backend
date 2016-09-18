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
    return view('welcome');
});

Route::group(['namespace' => 'Article'], function () {
    Route::resource('article', 'ArticleController');
});

Route::group(['namespace' => 'Course'], function () {
    Route::resource('course', 'CourseController');
});
