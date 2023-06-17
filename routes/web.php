<?php

use App\Http\Controllers\FrontController;
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

if (WebStatus() == 1) {
    Route::any('{all}', 'FrontController@RedirectionMode')->where('all', '^(?!admin).*$');
} else {
}
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', 'FrontController@index')->name('home');
    Route::get('/boxes/{id}', 'FrontController@boxes')->name('boxes');
    Route::get('/products', 'FrontController@products')->name('products');
    Route::get('/product/{id}', 'FrontController@product')->name('product');
    Route::post('ajax-request', 'FrontController@ajaxrequest')->name('ajaxrequest');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/checkout', 'FrontController@checkout')->name('checkout');
    Route::post('/checkout', 'FrontController@docheckout')->name('docheckout');
    route::get('/boxshowing/{uuid}', 'FrontController@boxshowing')->name('boxshowing');
    route::get('/productDetails/{id}', 'FrontController@productDetails')->name('productDetails');
    // Route::resource('boxes', 'FrontController');
    Route::post('SelectBoxes', 'FrontController@SelectBoxes')->name('SelectBoxes');
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
    Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
    Route::post('emailSend', 'FrontController@emailSend')->name('emailSend');
});
