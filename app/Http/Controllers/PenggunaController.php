<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
	public function index(){
		return view('Admin.dashboard');
	}
	public function olah_menu(){
		return view('Admin.menu');
	
	}
	public function olah_halaman(){
		return view('Admin.halaman');
	
	}
	public function data_pengguna(){
		return view('Admin.data_pengguna');
	
	}
}
