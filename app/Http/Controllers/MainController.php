<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Halaman;
use App\Berita;
use App\Visitor;
use App\KategoriBerita;
use App\Console\Helper;

class MainController extends Controller
{
	function __construct(Request $request){
		if(!isset($_COOKIE['VISITOR'])){
			setcookie('VISITOR', Helper::_user_agen()['name'], time()+60*60*24);
			Visitor::create([
							"ip" 		=> $request->ip(),
							"os" 		=> Helper::_user_agen()['platform'],
							"browser" 	=> Helper::_user_agen()['name'],
							"created_at"=> \Carbon\Carbon::now()->format('Y-m-d')
							]);
		}
	}
    public function index(){
        $data['news'] = Berita::take(3)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
        $data['news_video'] = Berita::take(2)->where('yt','!=','')->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
        $data['populer'] = Berita::take(4)->where('status', 'YA')->orderBy('views', 'DESC')->get();
		$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori')->get();
		foreach($kat as $row){
			$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			if(count($berita)>0)
				$data['news_by_kategori'][] = $berita[0];
		}
        return view('berita', $data);
    }
	public function search_berita(Request $request){
		if($request->typ == "kategori"){
			$data['berita'] = Berita::where('id_kategori',$request->search)->where('status', 'YA')->paginate(5);
			$data['card_header'] = "Kategori : ".KategoriBerita::findOrfail($request->search)->kategori;
		}else{
			$c = "YA";
			if($request->search == NULL) $c = "YAIN";
			$data['card_header'] = "Hasil Pencarian : ".$request->search.$request->ip();
			$data['berita'] = Berita::where('judul_berita',  'like', '%'.$request->search.'%')->where('status', $c)->paginate(5);
		}
		$data['berita']->withPath(url()->current()."/?typ=".$request->typ."&search=".$request->search);
		
		$data['populer'] = Berita::take(4)->where('status', 'YA')->orderBy('views', 'DESC')->get();
		$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'ASC')->get();
		foreach($kat as $row){
			$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			if(count($berita)>0)
				$data['news_by_kategori'][] = $berita[0];
		}	
		return view('berita_search', $data);
	}
	
	public function read_berita($seo){
		if(!isset($_COOKIE["DIBACA"])){
			setcookie("DIBACA", $seo, time()+60*60*24);
			$berita = Berita::where('judul_seo', $seo)->where('status','YA');
			$v = $berita->get()[0]->views;
			$berita->update(["views"=>++$v]);
		}else{
			if($_COOKIE["DIBACA"] != $seo){
				setcookie("DIBACA", $seo, time()+60*60*24);
				$berita = Berita::where('judul_seo', $seo)->where('status','YA');
				$v = $berita->get()[0]->views;
				$berita->update(["views"=>++$v]);
			}
		}
		$berita = Berita::where('judul_seo', $seo)->where('status','YA')->get();
		$data['related'] = Berita::take(2)->where('id_kategori', $berita[0]->id_kategori)->where('id_berita','!=', $berita[0]->id_berita)->where('status','YA')->get();
        $data['populer'] = Berita::take(4)->where('status', 'YA')->orderBy('views', 'DESC')->get();
		if(count($berita)>0){
			$data['berita'] = $berita;
			$data['next'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '>', $seo)->where('status', 'YA')->get();
			$data['prev'] = Berita::take(1)->select('judul_seo')->where('judul_seo', '<', $seo)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
			$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'ASC')->get();
			foreach($kat as $row){
				$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
				if(count($berita)>0)
					$data['news_by_kategori'][] = $berita[0];
			}	
			return view('blog', $data);
		}
	}
	public function read_halaman($seo){
		$data['page'] = Halaman::where('judul_seo', $seo)->where('status','YA')->get()[0];
		$data['populer'] = Berita::take(4)->where('status', 'YA')->orderBy('views', 'DESC')->get();
		$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'ASC')->get();
			foreach($kat as $row){
				$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
				if(count($berita)>0)
					$data['news_by_kategori'][] = $berita[0];
			}	
		//dd($data);
		return view('halaman', $data);
	}
}
