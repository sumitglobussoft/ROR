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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['guest']], function () {

    /* // Authentication routes...
      //    Route::get('/logout', 'Auth\AuthController@getLogout');
      Route::resource('/login', 'Auth\AuthController@login');

      // Registration routes...
      Route::get('/register', 'Auth\AuthController@getRegister');
      Route::post('/register', 'Auth\AuthController@postRegister');
     */
});


Route::group(array('module' => 'Report', 'namespace' => 'Report\Controllers'), function () {

    Route::group(['middleware' => 'auth:report'], function () {


//                        Route::resource('/admin/listfilereport', 'ReportController@listFileReport');
//                        Route::resource('/admin/pending-report', 'ReportController@pendingReport');
//                        Route::resource('/admin/approved-report', 'ReportController@approvedReport');
//                        Route::resource('/admin/unapproved-report', 'ReportController@unapprovedReport');
        Route::resource('/filereport', 'ReportController@fileReport');
        Route::resource('/reportsteptwo', 'ReportController@reportStepTwo');
        Route::resource('/reportstepthree', 'ReportController@reportStepThree');
        Route::resource('/reportstepfour', 'ReportController@reportStepFour');
        Route::resource('/reportstepfive', 'ReportController@reportStepFive');
        Route::resource('/deletereport', 'ReportController@deleteReport');
        Route::get('/storesession/{reportid}', 'ReportController@storeSession');
        Route::resource('/removesession', 'ReportController@removeSession');
        Route::get('/addreportuser/{userid}', 'ReportController@addReportUser');
        Route::get('/viewreport/{reportid}', 'ReportController@viewReport');


        Route::resource('/ajaxaction', 'ReportController@ajaxAction');
        Route::resource('/uploadimage', 'ReportController@uploadImage');
        Route::resource('/uploadvideo', 'ReportController@uploadVideo');
        Route::resource('/uploadyoutube', 'ReportController@uploadYouTube');

        Route::resource('/changereportstatus', 'ReportController@changeReportStatus');


        Route::get('/access-denied', function () {
            return view("Report/Views/accessdenied");
        });
    });
});

