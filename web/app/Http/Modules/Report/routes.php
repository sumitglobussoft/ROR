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


//Route::resource('/report/dashboard','Admin\AdminController@dashboard');
//Route::get('/report/dashboard', function () {
//    return view('report.dashboard');
//});

//Route::resource('/report/dashboard', 'Admin\AdminController@reportlogin');
//
////Route group for access to authenticated users only.
//Route::group(['middleware' => ['auth']], function () {
//    //Route group for access to only report
//    Route::group(['middleware' => 'report'], function () {
//
//    });
//
//    //Route group for access to only report
//    Route::group(['middleware' => 'user'], function () {
//
//    });
//
//    //Route group for access to only report
//    Route::group(['middleware' => 'merchant'], function () {
//
//    });
//
//});
//
//
////Route group for access to only report
//Route::group(['middleware' => 'manager'], function () {
//
//});

//Route::get('report/login', function () {
//    return view("Admin/Layouts/reportlogin");
//});


Route::group(array('module' => 'Report', 'namespace' => 'Report\Controllers'), function () {
//    \Illuminate\Support\Facades\Session::put("startTime",microtime(true));//FOR CALCULATION IN EXECUTION TIME (ADMIN LAYOUT PAGE)

//    Route::get('/report/cacheClear', function () {
//        Cache::flush();
//        return Redirect::back()->with(['status' => 'success', 'msg' => 'Cache has been cleared.']);
//    });

//    \DB::listen(function ($query, $bindings, $time, $connection) {
//        $fullQuery = vsprintf(str_replace(array('%', '?'), array('%%', '%s'), $query), $bindings);
//        $result = $connection . ' (' . $time . '): ' . $fullQuery;
//        dump($result);
//    });

    Route::resource('/report/login', 'ReportController@reportlogin');


//IF  YOU NEED TO USE GET POST, USE THIS FORMAT AS IN BELOW BLOCK COMMENT
    /*Route::get('report/dashboard', function () {
        return view("Admin/Views/dashboard");
    }); */

    Route::group(['middleware' => 'auth:report'], function () {

        Route::resource('/report/logout', 'AdminController@reportLogout');
        Route::resource('/report/dashboard', 'AdminController@dashboard');
        Route::get('/report/access-denied', function () {
            return view("Admin/Views/accessdenied");
        });

        Route::resource('/report/pending-products', 'ProductController@pendingProducts');
        Route::resource('/report/add-product', 'ProductController@addProduct');

        Route::resource('/report/manage-categories', 'CategoryController@manageCategories');
        Route::resource('/report/add-category', 'CategoryController@addCategory');
        Route::get('/report/edit-category/{id}', 'CategoryController@editCategory');
        Route::post('/report/edit-category/{id}', 'CategoryController@editCategory');

        Route::resource('/report/manage-options', 'OptionController@manageOptions');
        Route::resource('/report/add-option', 'OptionController@addOption');
        Route::get('/report/edit-option/{id}', 'OptionController@editOption');
        Route::post('/report/edit-option/{id}', 'OptionController@editOption');
        Route::post('/report/option-ajax-handler', 'OptionController@optionAjaxHandler');

        Route::resource('/report/add-product', 'ProductController@addProduct');
        Route::resource('/report/manage-products', 'ProductController@manageProducts');


        Route::resource('/report/control-panel', 'SettingController@controlPanel');
        Route::get('/report/manage-settings/{section_id}', 'SettingController@manageSettings');
        Route::post('/report/manage-settings/{section_id}', 'SettingController@manageSettings');
        Route::post('/report/settings-ajax-handler', 'SettingController@settingsAjaxHandler');


        Route::resource('/report/manage-currencies', 'currencyController@manageCurrencies');
        Route::resource('/report/add-currency', 'currencyController@addCurrency');
        Route::get('/report/edit-currency/{currencyId}', 'currencyController@editCurrency');
        Route::post('/report/edit-currency/{currencyId}', 'currencyController@editCurrency');
        Route::post('/report/currency-ajax-handler', 'currencyController@currencyAjaxHandler');

        /* Feature controller route start */
        Route::resource('/report/manage-features', 'FeaturesController@manageFeatures');
        Route::resource('/report/add-feature-group', 'FeaturesController@addFeatureGroup');
        Route::get('/report/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
        Route::post('/report/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
//        Route::resource('/report/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
        Route::resource('/report/add-feature', 'FeaturesController@addFeature');
        Route::get('/report/edit-feature/{featureId}', 'FeaturesController@editFeature');
        Route::post('/report/edit-feature/{featureId}', 'FeaturesController@editFeature');
//        Route::resource('/report/edit-feature/{featureId}', 'FeaturesController@editFeature');
        /* Feature controller route end */

        Route::resource('/report/add-new-filtergroup', 'FilterController@addNewFiltergroup');
        Route::resource('/report/manage-filtergroup', 'FilterController@manageFilterGroup');

        Route::resource('/report/filter-ajax-handler', 'FilterController@filterAjaxHandler');

        Route::get('/report/edit-filtergroup/{id}', 'FilterController@editFilterGroup');
        Route::post('/report/edit-filtergroup/{id}', 'FilterController@editFilterGroup');

        Route::resource('/report/available-customer', 'CustomerController@availableCustomer');
        Route::resource('/report/customer-ajax-handler', 'CustomerController@customerAjaxHandler');
        Route::resource('/report/add-new-customer', 'CustomerController@addNewCustomer');
        Route::get('/report/edit-customer/{uid}', 'CustomerController@editCustomer');
        Route::post('/report/edit-customer/{uid}', 'CustomerController@editCustomer');
        Route::resource('/report/pending-customer', 'CustomerController@pendingCustomer');
        Route::resource('/report/deleted-customer', 'CustomerController@deletedCustomer');



        Route::resource('/report/add-new-manager', 'ManagerController@addNewManager');
        Route::resource('/report/available-manager', 'ManagerController@availableManager');
        Route::get('/report/edit-manager/{mid}', 'ManagerController@editManager');
        Route::post('/report/edit-manager/{mid}', 'ManagerController@editManager');
        Route::resource('/report/pending-manager', 'ManagerController@pendingManager');
     //   Route::resource('/report/manage-manager-permission', 'ManagerController@pendingManager');
        Route::resource('/report/manager-ajax-handler', 'ManagerController@managerAjaxHandler');


        Route::resource('/report/add-new-language', 'AdministrationController@addNewLanguage');
        Route::resource('/report/add-language-value', 'AdministrationController@addLanguageValue');
        Route::resource('/report/manage-language', 'AdministrationController@manageLanguage');
        Route::resource('/report/reportistration-ajax-handler', 'AdministrationController@reportistrationAjaxhandler');
        Route::get('/report/edit-language/{lid}', 'AdministrationController@editLanguage');
        Route::post('/report/edit-language/{lid}', 'AdministrationController@editLanguage');



        //-----------------------------ROUTES FOR MANAGER----------------------------------------
        //DON't DO ANYTHING IN THIS BLOCK YET [TO BE DONE AT THE END OF ADMIN MODULE WORK]
        // [COPY ALL ROUTES ABOVE AND REPLACE ADMIN IN URL WITH MANAGER]
        Route::resource('/manager/logout', 'AdminController@managerLogout');

        Route::resource('manager/dashboard', 'AdminController@dashboard');
        Route::get('/manager/access-denied', function () {
            return view("Admin/Views/accessdenied");
        });

    });


});

