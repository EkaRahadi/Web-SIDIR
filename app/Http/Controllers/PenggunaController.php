<?php

namespace App\Http\Controllers;

use \App\Console\Helper;
use \App\KategoriBerita;
use \App\Berita;
use \App\Menu;
use \App\KategoriBerita as Kategori;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
	public function index(){
		$data['judul'] = "Dashboard";
		$data['sub'] = "";
		$data['berita'] = Berita::count();
		$data['user'] = \App\Pengguna::count();
		return view('Admin.dashboard', $data);
	}
	public function olah_menu(){
		$data['judul'] = "Data Menu";
		$data['sub'] = "
						<li><a href='/admin/menu'>Data Menu</a></li>
						";
		$data['menu'] = Menu::all();
		return view('Admin.menu', $data);
	
	}
	public function tambah_menu(){
		$data['judul'] = "Data Menu";
		$data['sub'] = "
						<li><a href='/admin/menu'>Data Menu</a></li>
						<li><a href='/admin/tambah_menu'>Tambah Menu</a></li>
						";
		$data['menu'] = Menu::all();
		return view('Admin.tambah_menu', $data);
	}
	public function olah_halaman(){
		$data['judul'] = "Data Halaman";
		$data['sub'] = "
						<li><a href='/admin/halaman'>Data Halaman</a></li>
						";
		return view('Admin.halaman', $data);
	
	}
	public function data_pengguna(){
		$data['judul'] = "Data Pengguna";
		$data['sub'] = "
						<li><a href='/admin/data_pengguna'>Data Pengguna</a></li>
						";
		return view('Admin.data_pengguna', $data);
	
	}
	public function proses_tambah_menu(Request $request){
		$menu = array("parent"=>$request->parent,
						"nama_menu"=>$request->nama_menu,
						"link"=>$request->link,
						"status"=>$request->aktivasi,
						"urutan"=>$request->urutan);
		if(Menu::create($menu)){
			return redirect('/admin/menu')->with(['info'=>'Berhasil Tambah Menu']);
		}
		return redirect('/admin/menu')->with(['error'=>'Tambah Menu Tidak Berhasil']);
	}

	public function kelola_berita(){
		$data['judul'] = "Kelola Berita";
		$data['sub'] = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						";
		$data['berita']	= Berita::all(); 
		$data['KategoriBerita']	= KategoriBerita::all(); 
		return view('Admin.kelola_berita', $data);
	
	}
	public function tambah_berita(){
		$data['judul'] = "Tambah Berita";
		$data['sub'] = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						<li><a href='/admin/tambah_berita'>Tambah Berita</a></li>
						";
		$data['kategori'] = Kategori::all();
		return view('Admin.tambah_berita', $data);
	
	}
	
	public function proses_tambah_berita(Request $request){
		$berita = array(
					"judul_berita"	=> $request->judul_berita,
					"judul_seo"		=> Helper::judul_seo($request->judul_berita),
					"id_kategori"	=> $request->id_kategori,
					"isi_berita"	=> $request->isi_berita,
					"foto"			=> $request->foto,
					"yt"			=> $request->yt,
					"status"		=> $request->status,
					"views"			=> 0,
					"post_by"		=> \Session::get("logged_in")[0]
					);	
		if(Berita::create($berita)){
			return redirect('/admin/kelola_berita')->with(['info'=>'Berhasil Tambah Berita']);
		}
		return redirect('/admin/kelola_berita')->with(['error'=>'Tambah Berita Tidak Berhasil']);
	}

}
	
