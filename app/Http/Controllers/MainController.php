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
	public function read_berita($seo){
		$berita = Berita::where('judul_seo', $seo)->where('status','YA')->get();
		if(count($berita)>0){
			$data['berita'] = $berita;
			$data['next'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '>', $seo)->where('status', 'YA')->get();
			$data['prev'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '<', $seo)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			return view('blog', $data);
			//dd($data);
		}
	}
	public function read_halaman($link){
		
	}
}
