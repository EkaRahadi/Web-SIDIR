<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pengaduan;
use \App\Berita;
use \App\KategoriBerita;

class PengaduanController extends Controller
{
    public function index(){
		$data['populer'] = Berita::take(4)->where('status', 'YA')->orderBy('views', 'DESC')->get();
		$kat = KategoriBerita::select('id_kategori')->take(5)->orderBy('id_kategori', 'ASC')->get();
			foreach($kat as $row){
				$berita = Berita::where('id_kategori', $row->id_kategori)->where('status', 'YA')->orderBy('id_berita', 'DESC')->get();
				if(count($berita)>0)
					$data['news_by_kategori'][] = $berita[0];
			}
		return view('pengaduan', $data);
	}
	public function submit(Request $request){
		$kode = "P-DISNAKER/".rand(10,99)."/".\Carbon\Carbon::now()->format('y/m/d/h');//echo $kode;
		$pengaduan = [
					"nama" => $request->nama,
					"nope" => $request->nope,
					"isi_pengaduan" => $request->isi_pengaduan,
					"kode_pengaduan" => $kode,
					"dilihat" => "BELUM"
					];
					$request->validate([
						'captcha' => 'required|captcha'
					]);
		if(Pengaduan::create($pengaduan)){
			return redirect('/pengaduan')->with(["info"=>"Laporan anda sudah kami terima", "kode"=>$kode]);}
	}
	public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
