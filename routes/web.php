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

Route::post('/novo-pedido', 'NewRequestController@search')->name('search-client');

Route::post('/get-product-by-cnpj', 'NewRequestController@getProductByCnpj')->name('get-product-by-cnpj');

Route::post('/remove-product', 'NewRequestController@destroy')->name('remove-product');

Route::post('/suggested-value-product', 'NewRequestController@suggestedValueProduct')->name('suggested-value-product');

Route::view('/procurar-cliente', 'search-client');

Route::view('/adicionar-produto', 'add-product');

Route::post('/search-product', 'ProductController@search')->name('search-product');

Route::post('/add-product', 'NewRequestController@store')->name('adicionar-produto');
