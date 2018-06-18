<?php

/**
 * Public route group
 */
Route::get('/', 'HomeController@welcome');

Route::post('/main/add', 'HomeController@add');

/**
 * Login route group
 */
Route::get('/login/vk', 'Auth\LoginController@redirectToProvider');

Route::get('/login/vk/catch', 'Auth\LoginController@redirectToProvider');

Route::get('/login/vk/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

/**
 * Admin route group
 */
Route::middleware('auth')->group(
  function () {

     Route::get(
       '/admin', function () {
        return view('admin.home');
     });

     Route::get('/admin/table/information', 'InformationController@table');
     Route::any('/admin/table/delete', 'InformationController@delete');
     Route::any('/admin/table/create', 'InformationController@create');
     Route::any('/admin/table/update', 'InformationController@update');
     Route::any('/admin/settings', 'AdminController@profile');
     Route::any('/admin/settings/set', 'AdminController@editAdminInformation');
     Route::get('/admin/settings/logout', 'AdminController@logout');
     Route::get('/admin/orders', 'UserController@show');
     Route::get('/admin/about', 'AdminController@documentation');
     Route::any('/admin/orders/delete', 'UserController@delete');
     Route::any('/admin/orders/complete', 'UserController@complete');
     Route::any('/admin/landing/preview', 'InformationController@preview');

  });