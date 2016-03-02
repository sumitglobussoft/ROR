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


//Route::resource('/business/dashboard','Admin\AdminController@dashboard');
//Route::get('/business/dashboard', function () {
//    return view('business.dashboard');
//});

//Route::resource('/business/dashboard', 'Admin\AdminController@businesslogin');
//
////Route group for access to authenticated users only.
//Route::group(['middleware' => ['auth']], function () {
//    //Route group for access to only business
//    Route::group(['middleware' => 'business'], function () {
//
//    });
//
//    //Route group for access to only business
//    Route::group(['middleware' => 'user'], function () {
//
//    });
//
//    //Route group for access to only business
//    Route::group(['middleware' => 'merchant'], function () {
//
//    });
//
//});
//
//
////Route group for access to only business
//Route::group(['middleware' => 'manager'], function () {
//
//});

//Route::get('business/login', function () {
//    return view("Admin/Layouts/businesslogin");
//});


Route::group(array('module' => 'Business', 'namespace' => 'Business\Controllers'), function () {
//    \Illuminate\Support\Facades\Session::put("startTime",microtime(true));//FOR CALCULATION IN EXECUTION TIME (ADMIN LAYOUT PAGE)

//    Route::get('/business/cacheClear', function () {
//        Cache::flush();
//        return Redirect::back()->with(['status' => 'success', 'msg' => 'Cache has been cleared.']);
//    });

//    \DB::listen(function ($query, $bindings, $time, $connection) {
//        $fullQuery = vsprintf(str_replace(array('%', '?'), array('%%', '%s'), $query), $bindings);
//        $result = $connection . ' (' . $time . '): ' . $fullQuery;
//        dump($result);
//    });

    Route::resource('/business/login', 'BusinessController@businesslogin');


//IF  YOU NEED TO USE GET POST, USE THIS FORMAT AS IN BELOW BLOCK COMMENT
    /*Route::get('business/dashboard', function () {
        return view("Admin/Views/dashboard");
    }); */

    Route::group(['middleware' => 'auth:business'], function () {

        Route::resource('/business/logout', 'AdminController@businessLogout');
        Route::resource('/business/dashboard', 'AdminController@dashboard');
        Route::get('/business/access-denied', function () {
            return view("Admin/Views/accessdenied");
        });

        Route::resource('/business/pending-products', 'ProductController@pendingProducts');
        Route::resource('/business/add-product', 'ProductController@addProduct');

        Route::resource('/business/manage-categories', 'CategoryController@manageCategories');
        Route::resource('/business/add-category', 'CategoryController@addCategory');
        Route::get('/business/edit-category/{id}', 'CategoryController@editCategory');
        Route::post('/business/edit-category/{id}', 'CategoryController@editCategory');

        Route::resource('/business/manage-options', 'OptionController@manageOptions');
        Route::resource('/business/add-option', 'OptionController@addOption');
        Route::get('/business/edit-option/{id}', 'OptionController@editOption');
        Route::post('/business/edit-option/{id}', 'OptionController@editOption');
        Route::post('/business/option-ajax-handler', 'OptionController@optionAjaxHandler');

        Route::resource('/business/add-product', 'ProductController@addProduct');
        Route::resource('/business/manage-products', 'ProductController@manageProducts');


        Route::resource('/business/control-panel', 'SettingController@controlPanel');
        Route::get('/business/manage-settings/{section_id}', 'SettingController@manageSettings');
        Route::post('/business/manage-settings/{section_id}', 'SettingController@manageSettings');
        Route::post('/business/settings-ajax-handler', 'SettingController@settingsAjaxHandler');


        Route::resource('/business/manage-currencies', 'currencyController@manageCurrencies');
        Route::resource('/business/add-currency', 'currencyController@addCurrency');
        Route::get('/business/edit-currency/{currencyId}', 'currencyController@editCurrency');
        Route::post('/business/edit-currency/{currencyId}', 'currencyController@editCurrency');
        Route::post('/business/currency-ajax-handler', 'currencyController@currencyAjaxHandler');

        /* Feature controller route start */
        Route::resource('/business/manage-features', 'FeaturesController@manageFeatures');
        Route::resource('/business/add-feature-group', 'FeaturesController@addFeatureGroup');
        Route::get('/business/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
        Route::post('/business/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
//        Route::resource('/business/edit-feature-group/{featureId}', 'FeaturesController@editFeatureGroup');
        Route::resource('/business/add-feature', 'FeaturesController@addFeature');
        Route::get('/business/edit-feature/{featureId}', 'FeaturesController@editFeature');
        Route::post('/business/edit-feature/{featureId}', 'FeaturesController@editFeature');
//        Route::resource('/business/edit-feature/{featureId}', 'FeaturesController@editFeature');
        /* Feature controller route end */

        Route::resource('/business/add-new-filtergroup', 'FilterController@addNewFiltergroup');
        Route::resource('/business/manage-filtergroup', 'FilterController@manageFilterGroup');

        Route::resource('/business/filter-ajax-handler', 'FilterController@filterAjaxHandler');

        Route::get('/business/edit-filtergroup/{id}', 'FilterController@editFilterGroup');
        Route::post('/business/edit-filtergroup/{id}', 'FilterController@editFilterGroup');

        Route::resource('/business/available-customer', 'CustomerController@availableCustomer');
        Route::resource('/business/customer-ajax-handler', 'CustomerController@customerAjaxHandler');
        Route::resource('/business/add-new-customer', 'CustomerController@addNewCustomer');
        Route::get('/business/edit-customer/{uid}', 'CustomerController@editCustomer');
        Route::post('/business/edit-customer/{uid}', 'CustomerController@editCustomer');
        Route::resource('/business/pending-customer', 'CustomerController@pendingCustomer');
        Route::resource('/business/deleted-customer', 'CustomerController@deletedCustomer');



        Route::resource('/business/add-new-manager', 'ManagerController@addNewManager');
        Route::resource('/business/available-manager', 'ManagerController@availableManager');
        Route::get('/business/edit-manager/{mid}', 'ManagerController@editManager');
        Route::post('/business/edit-manager/{mid}', 'ManagerController@editManager');
        Route::resource('/business/pending-manager', 'ManagerController@pendingManager');
     //   Route::resource('/business/manage-manager-permission', 'ManagerController@pendingManager');
        Route::resource('/business/manager-ajax-handler', 'ManagerController@managerAjaxHandler');


        Route::resource('/business/add-new-language', 'AdministrationController@addNewLanguage');
        Route::resource('/business/add-language-value', 'AdministrationController@addLanguageValue');
        Route::resource('/business/manage-language', 'AdministrationController@manageLanguage');
        Route::resource('/business/businessistration-ajax-handler', 'AdministrationController@businessistrationAjaxhandler');
        Route::get('/business/edit-language/{lid}', 'AdministrationController@editLanguage');
        Route::post('/business/edit-language/{lid}', 'AdministrationController@editLanguage');



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

