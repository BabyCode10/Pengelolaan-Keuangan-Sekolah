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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::post('/siswa/import', 'SiswaController@import_excel')->name('siswa.import');

Route::get('/siswa/export', 'SiswaController@export_excel')->name('siswa.export');

Route::resource('/siswa', 'SiswaController');

Route::resource('/transaksi', 'TransaksiController');