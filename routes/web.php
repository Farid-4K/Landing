<?php

/**
 * Public route group
 */

Route::get('/', 'HomeController@welcome')->middleware('siteStatus');
Route::any('/main/add', 'HomeController@add')->middleware('siteStatus');

/**
 * Login route group
 */
Auth::routes();
Route::get('/login/vk', 'Auth\LoginController@redirectToProvider');
Route::get('/login/vk/catch', 'Auth\LoginController@redirectToProvider');
Route::get('/login/vk/callback', 'Auth\LoginController@handleProviderCallback');

/**
 * Admin route group
 */
Route::middleware('auth')->namespace('Admin')->group(
  function () {
     /**
      * Group without connection to database
      */
     Route::get(
       '/admin', function () {
        return view('admin.home');
     });

     Route::get(
       '/admin/about', function () {
        return view('admin.makeup_rules');
     });

     Route::get(
       '/v2', function () {
        return view('v2.landing');
     });
     /**
      * Group that edits the content
      */
     Route::get('/admin/table/', 'InformationController@table');
     Route::get('/admin/table/delete', 'InformationController@delete');
     Route::get('/admin/table/create', 'InformationController@create');
     Route::get('/admin/table/delete/unused', 'InformationController@deleteUnused');
     Route::get('/admin/table/create/unused', 'InformationController@createUnused');
     Route::get('/admin/table/erase/unused', 'InformationController@eraseUnused');

     /**
      * Group that edits the profile setting
      */
     Route::any('/admin/settings/profile', 'AdminController@showProfile');
     Route::any('/admin/settings/set/admin', 'AdminController@set');
     Route::any('/admin/settings/set/mail', 'AdminController@setMail');
     Route::any('/admin/settings/set/password', 'AdminController@setPassword');
     Route::get('/admin/settings/untie', 'AdminController@untie');
     Route::any('/admin/settings/upload/zip', 'AdminController@uploadZip');
     Route::get('/admin/settings/site/enable','AdminController@siteStatusEnable');
     Route::get('/admin/settings/site/disable','AdminController@siteStatusDisable');

     /**
      * Group that control for orders
      */
     Route::get('/admin/orders', 'OrdersController@show');
     Route::any('/admin/orders/delete', 'OrdersController@delete');
     Route::any('/admin/orders/complete', 'OrdersController@complete');

     /**
      * Landing preview route
      */
     Route::any('/admin/landing/preview', 'InformationController@preview');
  });
