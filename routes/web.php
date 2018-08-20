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

/*
|--------------------------------------------------------------------------
| Web Routes Master
|--------------------------------------------------------------------------
*/

Route::get('ruangan', function () {
    return view('master/ruangan');
});

Route::resource('master_ruang', 'RuangController');
Route::get('api/master_ruang', 'RuangController@apiMasterRuang')->name('api.master_ruang');
/*
|--------------------------------------------------------------------------
| End of Web Routes Konfigurasi
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Web Routes Konfigurasi
|--------------------------------------------------------------------------
*/

Route::get('/konfig-tahun', function () {
    return view('konfigurasi/tahun_ajaran');
});

Route::resource('tahun_ajaran', 'TahunAjaranController');
Route::get('api/tahun_ajaran', 'TahunAjaranController@apiTahunAjaran')->name('api.tahun_ajaran');

Route::get('/konfig-kurikulum', function () {
    return view('konfigurasi/kurikulum');
});

Route::resource('konfig_kurikulum', 'KurikulumController');
Route::get('api/konfig_kurikulum', 'KurikulumController@apiKonfigKurikulum')->name('api.konfig_kurikulum');

/*
|--------------------------------------------------------------------------
| End of Web Routes Konfigurasi
|--------------------------------------------------------------------------
*/



Route::get('about', function () {
    return view('about');
});







