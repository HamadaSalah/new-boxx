<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@doLogin')->name('login');
});
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/index', 'LoginController@index')->name('index');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::resource('/collections', 'CollectionsController');
    Route::get('/collectionaddNewProduct/{id}', 'CollectionsController@addNewProduct')->name('collectionaddNewProduct');
    Route::post('collectionDeleteProduct/{id}', 'CollectionsController@DeleteProduct')->name('collectionDeleteProduct');
    Route::POST('/collectionaddNewProduct/{id}', 'CollectionsController@SaveNewProduct')->name('collectionSaveNewProduct');
    Route::POST('/createboxes/{id}', 'CollectionsController@createboxes')->name('createboxes');
    Route::resource('boxes', 'BoxesController');
    Route::get('boxes/boxesqrcode/{uuid}', 'BoxesController@QrCode')->name('QrCode');
    Route::resource('category', 'CategoriesController');
    Route::resource('brand', 'BrandsController');
    Route::resource('products', 'ProductsController');
    route::post('upload_ck_image', "ProductsController@upload_ck_image")->name('CKUploader');
    Route::post('UpdateStatus', 'BoxesController@UpdateStatus')->name('UpdateStatus');
    Route::post('UpdateStatusMain', 'MainBoxesController@UpdateStatus')->name('UpdateStatusMain');
    Route::DELETE('/boxdeleting/{bid}/{pid}', 'BoxesController@boxdeleting')->name('boxdeleting');
    Route::resource('roles','RoleController');
    Route::resource('admins','AdminsController');
    Route::resource('orders','OrdersController');
    Route::get('/readAllNotification', 'OrdersController@readAllNotification')->name('readAllNotification');
    Route::resource('settings','SettingsController');
    Route::resource('mainboxes','MainBoxesController');
    Route::post('ImportBulk/{id}', 'BulkProductsController@storeBulk')->name('bulkproducts');
    Route::post('export', 'BulkProductsController@export')->name('export');
    Route::resource('suppliers','SupplyController');

});
