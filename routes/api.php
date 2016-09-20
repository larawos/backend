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

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['namespace' => 'Article'], function () {
        Route::resource('article', 'ArticleController');
    });

    Route::group(['namespace' => 'Course'], function () {
        Route::resource('course', 'CourseController');
    });
    
});