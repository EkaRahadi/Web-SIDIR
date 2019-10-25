<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    //
	public function index(){
		if(!empty(\Session::get('logged_in'))){
			return view('Admin.dashboard');
		}else{
			return redirect()->route('login.form');
		}
	}
}
