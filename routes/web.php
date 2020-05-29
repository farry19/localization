<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/newsitems', 'NewsItemsController');
Route::resource('/languages', 'LanguagesController');

Route::get('/order', 'OrdersController@create')->name('create_order');
Route::post('/order', 'OrdersController@store')->name('store_order');