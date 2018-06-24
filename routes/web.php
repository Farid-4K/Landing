<?php

/**
 * Public route group
 */
Route::get('/', 'HomeController@welcome');
Route::post('/main/add', 'HomeController@add');

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
      Route::any('/admin/table/delete', 'InformationController@delete');
      Route::any('/admin/table/create', 'InformationController@create');
      Route::any('/admin/table/delete/unused', 'InformationController@deleteUnused');
      Route::any('/admin/table/create/unused', 'InformationController@createUnused');
      Route::any('/admin/table/erase/unused', 'InformationController@eraseUnused');

      /**
       * Group that edits the profile setting
       */
      Route::any('/admin/settings/profile', 'AdminController@showProfile');
      Route::any('/admin/settings/set', 'AdminController@set');
      Route::any('/admin/settings/setPassword', 'AdminController@setPassword');
      Route::get('/admin/settings/untie', 'AdminController@untie');

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
