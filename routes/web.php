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

Route::get('/', 'MainController@index');

Route::get('/login', 'LoginController@index')->name('login.form');
Route::post('/attempt', 'LoginController@attempt')->name('login.attempt');
Route::get('/logout', 'LoginController@logout');

Route::middleware('cek-login')->group(function(){
    Route::prefix('admin')->group(function() {
        Route::get('/', 'PenggunaController@index');
        Route::get('/data_pengguna', 'PenggunaController@data_pengguna')->name('data_pengguna');
        Route::get('/menu', 'PenggunaController@olah_menu');
        Route::get('/tambah_menu','PenggunaController@tambah_menu')->name('tambah_menu');
        Route::get('/halaman', 'PenggunaController@olah_halaman');
        Route::get('/kelola_berita', 'PenggunaController@kelola_berita')->name('kelola_berita');
        Route::post('/proses_tambah_menu', 'PenggunaController@proses_tambah_menu');
        Route::get('/tambah_berita', 'PenggunaController@tambah_berita')->name('tambah_berita');

    });
});

Route::get('/generate_password/{psw}', function($psw){echo bcrypt($psw);});