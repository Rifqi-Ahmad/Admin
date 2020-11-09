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

Route::get('/', 'DashboardController@home');
Route::get('/purchaseorder', 'PurchaseOrderController@index');
Route::get('/purchaseorder/data', 'PurchaseOrderController@data');
Route::get('/aruskas', 'ArusKasController@index');
Route::get('/aset', 'AsetController@index');
Route::get('/salesorder', 'SalesOrderController@index');
Route::get('/salesorder/data', 'SalesOrderController@data');
Route::get('/stokmaterial', 'StokMaterialController@index');
Route::get('/stokbarang', 'StokBarangController@index');


// Master Barang
Route::get('/masterbarang', 'MasterBarangController@index');
Route::post('/masterbarang', 'MasterBarangController@store');
Route::delete('/masterbarang/{masterbarang}', 'MasterBarangController@destroy');
Route::patch('/masterbarang/{masterbarang}', 'MasterBarangController@update');
