<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pengguna;

class LoginController extends Controller
{
    //
	public function index(){
		if(!empty(\Session::get('logged_in'))){
			return redirect('admin');
		}else{
			return view('Admin.login');
		}
	}
	
	public function attempt(Request $request){
		$attempts = [
            'username' => $request->username,
            'password' => $request->password,
        ];
		$auth = auth()->guard('users');
		if ($auth->attempt($attempts, (bool) $request->remember_me)) {
			$user = Pengguna::where('username', $request->username)->first();
			$request->session()->put('logged_in', [$user->id_pengguna, $user->level]);
            return redirect()->intended('admin');
        }
		return redirect()->back()->with(['warning' => 'Username atau Password salah']);;
	}
	
	public function logout(){
		\Session::forget('logged_in');
		return redirect('login')->with(['info'=>'Logout Berhasil']);
	}
}