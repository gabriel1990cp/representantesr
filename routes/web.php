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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'NewRequestController@index')->name('home');

Route::post('/create-request', 'NewRequestController@create')->name('create.request');

Route::get('/show-request', 'NewRequestController@show')->name('view.reqquest');

Route::post('/search-client', 'SearchClientController@search')->name('search-client');

Route::view('/search-client', 'search-client');

Route::view('/add-product', 'add-product');

Route::post('/search-product', 'ProductController@search')->name('search-product');
