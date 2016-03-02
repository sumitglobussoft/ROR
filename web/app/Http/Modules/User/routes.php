<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



Route::group(['middleware' => ['guest']], function () {

    /* // Authentication routes...
      //    Route::get('/logout', 'Auth\AuthController@getLogout');
      Route::resource('/login', 'Auth\AuthController@login');

      // Registration routes...
      Route::get('/register', 'Auth\AuthController@getRegister');
      Route::post('/register', 'Auth\AuthController@postRegister');
     */
});




Route::group(array('module' => 'User', 'namespace' => 'User\Controllers'), function () {

    Route::resource('/', 'UserController@index');
    Route::resource('/login', 'UserController@login');
    Route::resource('/register', 'UserController@register');

//    Route::resource('/user/index', 'UserController@index');
//    Route::resource('/location-ajax-handler', 'UserController@locationAjaxHandler');
    Route::get('/logout', 'UserController@logout');
    Route::resource('/profile', 'UserController@userProfile');
    Route::resource('/user-ajax-handler', 'UserController@userAjaxHandler');
    Route::resource('/changepassword', 'UserController@changePassword');
    Route::get('/search_report', 'UserController@searchReport');
    Route::post('/search_report', 'UserController@searchReport');
//    Route::get('/details/', 'UserController@ReportDetalils');
    Route::resource('/details/{report_id}', 'UserController@ReportDetalils');

//    Route::resource('/forgot_password', 'UserController@forgotPassword');

    Route::group(['middleware' => 'auth:user'], function () {
        Route::resource('/report', 'UserController@dashboard');

    });
});

