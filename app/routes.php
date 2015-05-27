<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/',array('uses'=>'StoreController@getIndex'));
Route::controller('admin/categories', 'CategoriesController');
Route::controller('admin/products','ProductsController');
Route::controller('store','StoreController');
Route::controller('users', 'UsersController');
