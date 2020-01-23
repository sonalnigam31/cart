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

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/myproduct/ajaxCart', 'HomeController@addToCart');
Route::post('/ApplyCoupon/mycoupon', 'HomeController@applycoupon');
Route::get('/cart', 'HomeController@cart')->name('cart');

Route::post('/updatecart', 'HomeController@updateCart')->name('updatecart');