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
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('jenis_barang', 'jenisBarangController');
Route::resource('lokasi_warehouse', 'lokasiWarehouseController');
Route::resource('informasi_barang', 'informasiBarangController');
Route::get('informasi_barang_masuk', 'informasiBarangController@indexReceipt')->name('informasi_barang_masuk');
Route::get('informasi_barang_keluar', 'informasiBarangController@indexIssue')->name('informasi_barang_keluar');
