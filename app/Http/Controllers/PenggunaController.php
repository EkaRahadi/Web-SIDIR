<?php

namespace App\Http\Controllers;

use \App\Menu;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
	public function index(){
		return view('Admin.dashboard');
	}
	public function olah_menu(){
		$data['menu'] = Menu::all();
		return view('Admin.menu', $data);
	
	}
	public function tambah_menu(){
		return view('Admin.tambah_menu');
	}
	public function olah_halaman(){
		return view('Admin.halaman');
	
	}
	public function data_pengguna(){
		return view('Admin.data_pengguna');
	
	}

}
	
