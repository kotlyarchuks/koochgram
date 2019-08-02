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

Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index');
    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'Admin\ProductsController@index')->name('admin-list-products');
        Route::post('/', 'Admin\ProductsController@store');
        Route::get('{product}/edit', 'Admin\ProductsController@edit');
        Route::patch('{product}', 'Admin\ProductsController@update');
        Route::delete('{product}', 'Admin\ProductsController@destroy');
        Route::get('/create', 'Admin\ProductsController@create')->name('create-product');
    });
});
