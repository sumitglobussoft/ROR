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




Route::group(array('module' => 'User', 'namespace' => 'User\Controllers'), function () {

    Route::resource('/', 'UserController@index');
    Route::resource('/login', 'UserController@login');
    Route::resource('/register', 'UserController@register');
//    Route::resource('/user/index', 'UserController@index');
    Route::get('/logout', 'UserController@logout');
    Route::post('/userAjaxHandler', 'UserController@userAjaxHandler');

    Route::group(['middleware' => 'auth:user'], function () {
        Route::resource('/report', 'UserController@dashboard');
//                        Route::resource('/admin/logout', 'AdminController@adminLogout');
//
//                        Route::resource('/admin/category', 'CategoryController@category');
//                        Route::resource('/admin/addcategory', 'CategoryController@addCategory');
//                        Route::resource('/admin/updatecategory', 'CategoryController@updateCategory');
//                        Route::resource('/admin/deletecategory', 'CategoryController@deleteCategory');
//
//
//                        Route::get('/admin/subcategory/{categoryid}', 'CategoryController@subcategory');
//                        Route::resource('/admin/addsubcategory', 'CategoryController@addSubCategory');
//                        Route::resource('/admin/updatesubcategory', 'CategoryController@updateSubCategory');
//                        Route::resource('/admin/deletesubcategory', 'CategoryController@deleteSubCategory');
//
//                        Route::resource('/admin/listfilereport', 'ReportController@listFileReport');
//                        Route::resource('/admin/pending-report', 'ReportController@pendingReport');
//                        Route::resource('/admin/approved-report', 'ReportController@approvedReport');
//                        Route::resource('/admin/unapproved-report', 'ReportController@unapprovedReport');
//                        Route::resource('/admin/filereport', 'ReportController@fileReport');
//                        Route::resource('/admin/reportsteptwo', 'ReportController@reportStepTwo');
//                        Route::resource('/admin/reportstepthree', 'ReportController@reportStepThree');
//                        Route::resource('/admin/reportstepfour', 'ReportController@reportStepFour');
//                        Route::resource('/admin/reportstepfive', 'ReportController@reportStepFive');
//                        Route::resource('/admin/deletereport', 'ReportController@deleteReport');
//                        Route::get('/admin/storesession/{reportid}', 'ReportController@storeSession');
//                        Route::resource('/admin/removesession', 'ReportController@removeSession');
//                        Route::get('/admin/addreportuser/{userid}', 'ReportController@addReportUser');
//                        Route::get('/admin/viewreport/{reportid}', 'ReportController@viewReport');
//
//
//
//                        Route::resource('/admin/ajaxaction', 'ReportController@ajaxAction');
//                        Route::resource('/admin/uploadimage', 'ReportController@uploadImage');
//                        Route::resource('/admin/uploadvideo', 'ReportController@uploadVideo');
//                        Route::resource('/admin/uploadyoutube', 'ReportController@uploadYouTube');
//
//                        Route::resource('/admin/changereportstatus', 'ReportController@changeReportStatus');
//
//                        Route::resource('/admin/users', 'UsersController@users');
//                        Route::resource('/admin/businessuser', 'UsersController@business');
//                        Route::resource('/admin/profile', 'UsersController@adminprofile');
//
//                        Route::resource('/admin/rebuttal', 'RebuttalController@rebuttalguidelines');
//                        Route::resource('/admin/rebuttal/step2', 'RebuttalController@writeyourreport');
//                        Route::resource('/admin/rebuttal/step3', 'RebuttalController@reviewandsubmit');
////        Route::resource('/admin/rebuttal-ajax-handler', 'RebuttalController@writeyourreport');
//
//                        Route::resource('/admin/managebusiness', 'BusinessController@businessData');
//                        Route::resource('/admin/businessmanage-ajax-handler', 'BusinessController@businessAjaxhandler');
//
//
//
//                        Route::resource('/admin/users-ajax-handler', 'UsersController@usersAjaxhandler');
//                        Route::resource('/admin/business-ajax-handler', 'UsersController@businessAjaxhandler');
//
//                        Route::get('/admin/review/{reportid}', 'ReviewController@review');
//                        Route::resource('/admin/list-review', 'ReviewController@listReview');
//                        Route::resource('/admin/pending-review', 'ReviewController@pendingReview');
//                        Route::resource('/admin/approved-review', 'ReviewController@approvedReview');
//                        Route::resource('/admin/unapproved-review', 'ReviewController@unapprovedReview');
//                        Route::post('/admin/addreview', 'ReviewController@addReview');
//                        Route::post('/admin/updatereview', 'ReviewController@updateReview');
//                        Route::post('/admin/deletereview', 'ReviewController@deleteReview');
//
//                        Route::get('/admin/access-denied', function () {
//                                    return view("Admin/Views/accessdenied");
//                                });
    });
});

