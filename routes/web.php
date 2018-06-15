<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome');

Route::get('/login/vk', 'Auth\LoginController@redirectToProvider');
Route::get('/login/vk/catch', 'Auth\LoginController@redirectToProvider');
Route::get('/login/vk/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::middleware('auth')->group(function () {
   Route::get('/admin', function () {
      return view('admin.home');
   });
   Route::get('/admin/table/{page}', 'InformationController@table')
     ->where(['page' => '(information)']);
   Route::any('/admin/table/delete', 'InformationController@delete');
   Route::any('/admin/table/create', 'InformationController@create');
   Route::any('/admin/table/update', 'InformationController@update');
   Route::any('/admin/settings', 'AdminController@profile');
   Route::any('/admin/settings/set', 'AdminController@editAdminInformation');
   Route::get('/admin/settings/logout','AdminController@logout');
   Route::get('/admin/about','AdminController@documentation');
});