<?php

use App\PurchaseOrder;
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

//Purchase Order
Route::get('/purchaseorder', 'PurchaseOrderController@index')->name('po.index');
Route::get('/purchaseorder/data', 'PurchaseOrderController@data');
Route::post('/purchaseorder', 'PurchaseOrderController@add')->name('po.add');
Route::post('/purchaseorder/{id}', 'PurchaseOrderController@remove')->name('po.remove');
Route::patch('/purchaseorder', 'PurchaseOrderController@clear')->name('po.clear');

//Sales Order
Route::get('/salesorder', 'SalesOrderController@index')->name('so.index');
Route::get('/salesorder/data', 'SalesOrderController@data');
Route::post('/salesorder', 'SalesOrderController@add')->name('so.add');
Route::post('/salesorder/{id}', 'SalesOrderController@remove')->name('so.remove');
Route::patch('/salesorder', 'SalesOrderController@clear')->name('so.clear');


Route::get('/aruskas', 'ArusKasController@index');
Route::get('/aset', 'AsetController@index');
Route::get('/stokmaterial', 'StokMaterialController@index');
Route::get('/stokbarang', 'StokBarangController@index');


// Master Barang
Route::get('/masterbarang', 'MasterBarangController@index');
Route::post('/masterbarang', 'MasterBarangController@store');
Route::delete('/masterbarang/{masterbarang}', 'MasterBarangController@destroy');
Route::patch('/masterbarang/{masterbarang}', 'MasterBarangController@update');
