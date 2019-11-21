<?php

namespace App\Http\Controllers;

use \App\Menu;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
	public function index(){
		$data['judul'] = "Dashboard";
		$data['sub'] = "";
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
	public function kelola_berita(){
		$data['judul'] = "Kelola Berita";
		$data['sub'] = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						";
		return view('Admin.kelola_berita', $data);
	
	}
	public function proses_tambah_menu(Request $request){
		$menu = array("parent"=>$request->parent,
						"nama_menu"=>$request->nama_menu,
						"link"=>$request->link,
						"status"=>$request->aktivasi,
						"urutan"=>$request->urutan);
		$tmbh_menu = Menu::create($menu);
	}

}
	
