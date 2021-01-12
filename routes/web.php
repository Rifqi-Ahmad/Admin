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
Route::post('/purchaseorder', 'PurchaseOrderController@add')->name('po.add');
Route::post('/purchaseorder/{id}', 'PurchaseOrderController@remove')->name('po.remove');
Route::patch('/purchaseorder', 'PurchaseOrderController@clear')->name('po.clear');
Route::put('/purchaseorder', 'PurchaseOrderController@create')->name('po.create');

//Po Data
Route::delete('/purchaseorder/data/{id}', 'PoDataController@delete')->name('data.delete');
Route::get('/purchaseorder/data', 'PoDataController@index')->name('data.index');
Route::get('/purchaseorder/data/{id}/po', 'PoDataController@show')->name('data.show');
Route::get('/purchaseorder/data/{id}/pdf', 'PoDataController@pdf')->name('data.pdf');
Route::post('/purchaseorder/data/{id}/edit', 'PoDataController@add')->name('data.add');
Route::post('/purchaseorder/data/{id}/edit/{code}', 'PoDataController@remove')->name('data.remove');
Route::get('/purchaseorder/data/{id}/edit', 'PoDataController@edit')->name('data.edit');
Route::put('/purchaseorder/data/{id}/edit', 'PoDataController@update')->name('data.update');





//Sales Order
Route::get('/salesorder', 'SalesOrderController@index')->name('so.index');
Route::post('/salesorder', 'SalesOrderController@add')->name('so.add');
Route::post('/salesorder/{id}', 'SalesOrderController@remove')->name('so.remove');
Route::patch('/salesorder', 'SalesOrderController@clear')->name('so.clear');
Route::put('/salesorder', 'SalesOrderController@create')->name('so.create');

//SO Data
Route::get('/salesorder/data', 'SoDataController@index')->name('sdata.index');
Route::delete('/salesorder/data/{id}', 'SoDataController@delete')->name('sdata.delete');
Route::get('/salesorder/data/{id}/so', 'SoDataController@show')->name('sdata.show');
Route::get('/salesorder/data/{id}/pdf', 'SoDataController@pdf')->name('sdata.pdf');
Route::post('/salesorder/data/{id}/edit', 'SoDataController@add')->name('sdata.add');
Route::post('/salesorder/data/{id}/edit/{code}', 'SoDataController@remove')->name('sdata.remove');
Route::get('/salesorder/data/{id}/edit', 'SoDataController@edit')->name('sdata.edit');
Route::put('/salesorder/data/{id}/edit', 'SoDataController@update')->name('sdata.update');




Route::get('/stokmaterial', 'StokMaterialController@index');

// Master Barang
Route::get('/masterbarang', 'MasterBarangController@index');
Route::post('/masterbarang', 'MasterBarangController@store');
Route::delete('/masterbarang/{masterbarang}', 'MasterBarangController@destroy');
Route::patch('/masterbarang/{masterbarang}', 'MasterBarangController@update');
