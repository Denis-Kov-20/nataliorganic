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

Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');



/*Category*/
Route::get('/category', 'App\Http\Controllers\CategoryController@categories')->name('categories');

Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@category')->name('category');

/*Category end*/


/*Category*/
Route::get('/product/{slug}', 'App\Http\Controllers\ProductController@product')->name('product');

/*Category end*/



/*Cart*/
/*Route::post('/cart-show', 'CartController@show')->name('cart.show');*/
Route::post('/cart-add', 'App\Http\Controllers\CartController@add')->name('cart.add');
/*Route::post('/service/cart-add', 'CartController@serviceAdd')->name('service.cart.add');
Route::post('/cart-update', 'CartController@update')->name('cart.update');
Route::post('/cart-remove', 'CartController@remove')->name('cart.remove');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');*/
/*Cart end*/


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
