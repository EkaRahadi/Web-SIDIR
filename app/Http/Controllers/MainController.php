<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class MainController extends Controller
{
    public function index(){
        $data['news'] = Berita::take(3)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
        return view('berita', $data);
    }
	public function read_berita($id){
		$berita = Berita::where('id_berita', $id)->where('status','YA')->get();
		if(count($berita)>0){
			return view('blog');
		}
	}
	public function read_halaman($link){
		
	}
}
