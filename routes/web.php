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
Route::get('/berita', function(){return redirect('/');});
Route::get('/berita/{seo}/baca', 'MainController@read_berita');
Route::get('/berita/cari', 'MainController@search_berita');
Route::get('/halaman/{seo}', 'MainController@read_halaman');
Route::get('/pengaduan', 'PengaduanController@index');
Route::post('/pengaduan/submit', 'PengaduanController@submit')->name('submit_pengaduan');
Route::get('/refreshcaptcha', 'PengaduanController@refreshCaptcha');

Route::get('/login', 'LoginController@index')->name('login.form');
Route::post('/attempt', 'LoginController@attempt')->name('login.attempt');
Route::get('/logout', 'LoginController@logout');

Route::middleware('cek-login')->group(function(){
    Route::prefix('admin')->group(function() {
        Route::get('/', 'PenggunaController@index');
        Route::match(['get','post'],'/my_profil', 'PenggunaController@lihat_profil')->name('my_profil');
        Route::match(['get','post'],'/pengguna/{act}', 'PenggunaController@pengguna')->name('okeoce');
        Route::get('/data_pengguna', 'PenggunaController@data_pengguna')->name('data_pengguna');
        
		Route::post('/ckeditor_upload', 'PenggunaController@ckeditor_upload')->name('ckeditor_upload');
        
		Route::get('/menu', 'MenuController@index');
        Route::get('/tambah_menu','MenuController@tambah')->name('tambah_menu');
        Route::get('/edit_menu/{id}','MenuController@edit')->name('edit_menu');
        Route::get('/func_menu/{act}','MenuController@funct_menu');
		Route::post('/proses_tambah_edit', 'MenuController@proses_tambah_edit');
        
		Route::get('/homepage', 'AdminHPController@index');
        Route::post('/proses_tambah_slider', 'AdminHPController@proses_tambah_slider');
        Route::post('/proses_ganti_foto_samping', 'AdminHPController@proses_ganti_foto_samping');
        Route::get('/slider/{id}/hapus', 'AdminHPController@proses_hapus_slider');
		
        Route::get('/halaman', 'HalamanController@index');
        Route::get('/func_halaman/{act}', 'HalamanController@func_halaman');
        Route::get('/halaman/cek_judul_halaman/{hal}/{up}', 'HalamanController@cek_judul');
        Route::match(['get','post'], '/halaman/tambah', 'HalamanController@tambah')->name('tambah_halaman');
        Route::match(['get','post'], '/halaman/edit/{id}', 'HalamanController@edit')->name('edit_halaman');
		
        Route::post('/berita/proses_edit_berita', 'BeritaController@proses_edit_berita')->name('proses_edit_berita');
        Route::post('/berita/proses_tambah_berita', 'BeritaController@proses_tambah_berita');
        Route::get('/kelola_berita', 'BeritaController@index')->name('kelola_berita');
        Route::get('/berita/tambah_berita', 'BeritaController@tambah_berita')->name('tambah_berita');
		Route::get('/berita', function(){return redirect('/admin/kelola_berita');});
        Route::get('/berita/cek_judul_berita',  function(){return redirect('/admin/kelola_berita');});
        Route::get('/berita/cek_judul_berita/{judul}/{up}', 'BeritaController@cek_judul_berita');
		Route::get('/berita/{id}/{seo}/edit', 'BeritaController@edit_berita');
		Route::get('/berita/tambah_kategori/{kat}/{id}', 'BeritaController@proses_tambah_kategori');
		Route::get('/berita/hapus_kategori/{kat}', 'BeritaController@proses_hapus_kategori');
		Route::get('/berita/{seo}/{act}', 'BeritaController@proses_kelola_berita');
    });
});

Route::get('/generate_password/{psw}', function($psw){echo bcrypt($psw);});
Route::get('/unset_cookie', function(){unset($_COOKIE['VISITOR']); echo "OK";});
Route::get('/get_cookie', function(){if(isset($_COOKIE['VISITOR'])) echo $_COOKIE['VISITOR'];});