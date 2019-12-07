<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class MainController extends Controller
{
    public function index(){
        $data['news'] = Berita::take(3)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
		$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'DESC')->get();
		foreach($kat as $row){
			$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			if(count($berita)>0)
				$data['news_by_kategori'][] = $berita[0];
		}
        return view('berita', $data);
    }
	public function read_berita($seo){
		$berita = Berita::where('judul_seo', $seo)->where('status','YA')->get();
		if(count($berita)>0){
			$data['berita'] = $berita;
			$data['next'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '>', $seo)->where('status', 'YA')->get();
			$data['prev'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '<', $seo)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'DESC')->get();
			foreach($kat as $row){
				$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
				if(count($berita)>0)
					$data['news_by_kategori'][] = $berita[0];
			}	
			return view('blog', $data);
		}
	}
	public function read_halaman($link){
		
	}
}
