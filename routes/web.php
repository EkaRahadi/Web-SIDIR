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

Route::get('/login', 'LoginController@index')->name('login.form');
Route::post('/attempt', 'LoginController@attempt')->name('login.attempt');
Route::get('/logout', 'LoginController@logout');
Route::middleware('cek-login')->group(function(){
    Route::prefix('admin')->group(function() {
        Route::get('/', 'PenggunaController@index');
        
    });
});
Route::get('/generate_password/{psw}', function($psw){echo bcrypt($psw);});