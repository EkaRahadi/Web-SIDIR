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
}
