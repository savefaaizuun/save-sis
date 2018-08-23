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
/* Ruangan */
Route::get('ruangan', function () {
    return view('master/ruangan');
});

Route::resource('master_ruang', 'RuangController');
Route::get('api/master_ruang', 'RuangController@apiMasterRuang')->name('api.master_ruang');
/* End Ruangan */

Route::get('program-studi', function () {
    return view('master/program_studi');
});

Route::resource('master_prodi', 'ProgramStudiController');
Route::get('api/master_prodi', 'ProgramStudiController@apiMasterProdi')->name('api.master_prodi');

Route::get('mata-pelajaran', function () {
    return view('master/mata_pelajaran');
});

Route::resource('master_mapel', 'MataPelajaranController');
Route::get('api/master_mapel', 'MataPelajaranController@apiMasterMapel')->name('api.master_mapel');
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







