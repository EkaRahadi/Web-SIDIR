<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Console\Helper;
use \App\KategoriBerita as Kategori;
use \App\Berita;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index(){
		$data['judul'] = "Kelola Berita";
		$data['sub'] = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						";
		$data['berita']	= Berita::all(); 
		$data['KategoriBerita']	= Kategori::all(); 
		return view('Admin.kelola_berita', $data);
	
	}
	public function tambah_berita(){
		$data['judul'] = "Tambah Berita";
		$data['sub'] = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						<li><a href='/admin/tambah_berita'>Tambah Berita</a></li>
						";
		$data['kategori'] = Kategori::all();
		return view('Admin.tambah_berita', $data);
	
	}
	
	public function proses_tambah_berita(Request $request){
		
		$berita = array(
					"judul_berita"	=> $request->judul_berita,
					"judul_seo"		=> Helper::judul_seo($request->judul_berita),
					"id_kategori"	=> $request->id_kategori,
					"isi_berita"	=> $request->isi_berita,
					"yt"			=> $request->yt,
					"status"		=> $request->status,
					"views"			=> 0,
					"post_by"		=> \Session::get("logged_in")[0]
					);	
			$img = "";
			if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
		 
			   // if validation fails
			   if($validator->fails()) {
				   $img = "\n=>Foto Tidak dapat di Upload";
			   }else{
				$file->move(public_path('/assets/images/berita/'), $file->getClientOriginalName());
				   $berita["foto"] =  $file->getClientOriginalName(); 
			   }
			}
		if(Berita::create($berita)){
			return redirect('/admin/kelola_berita')->with(['info'=>'Berhasil Tambah Berita'.$img]);
		}
		return redirect('/admin/kelola_berita')->with(['error'=>'Tambah Berita Tidak Berhasil']);
	}
	public function proses_kelola_berita($id, $act){
		$berita = Berita::where('id_berita', $id);
		switch($act){
			case "lihat":
				if($berita->count() > 0)
					return json_encode(["stat"=>100, "mess"=>$berita->get()[0]->judul_seo]);
				return json_encode(["stat"=>404, "mess"=>"Berita Tidak ditemukan"]);
				break;
			case "hapus":
				\File::delete(public_path('assets/images/berita/'.$berita->get()[0]->foto));
				if($berita->delete())
					return json_encode(["stat"=>200, "mess"=>"Berita Terhapus"]);
				return json_encode(["stat"=>500, "mess"=>"Gagal Hapus Berita"]);
				break;
			case "publikasi-0":
				if($berita->update(["status"=>"TIDAK"]))
					return json_encode(["stat"=>200, "mess"=>"Berita Disembunyikan"]);
				return json_encode(["stat"=>500, "mess"=>"Gagal Menyembunyikan Berita"]);
				break;
			case "publikasi-1":
				if($berita->update(["status"=>"YA"]))
					return json_encode(["stat"=>200, "mess"=>"Berita Dipublikasikan"]);
				return json_encode(["stat"=>500, "mess"=>"Gagal Mempublikasikan Berita"]);
				break;	
			default: 
					return json_encode(["stat"=>404, "mess"=>"Perintah Tidak Dikenali"]);
					break;
		}
	}
	public function edit_berita($id, $seo){
		$sub = "
						<li><a href='/admin/kelola_berita'>Kelola Berita</a></li>
						<li><a href='#'>Edit Berita</a></li>
						";
		$berita = Berita::findOrFail($id);
		$kategori = Kategori::all();
		if($berita->judul_seo == $seo)
			return view('Admin.edit_berita', ["berita"=>$berita, "kategori"=>$kategori, "judul"=>"Edit Berita", "sub"=>$sub]);
		return redirect('/admin/kelola_berita')->with(['error'=>'Terjadi Kesalahan Saat Edit Berita']);
	}
	
	public function proses_edit_berita(Request $request){
		$berita = Berita::findOrFail($request->id_berita);
		$beritaArr = array(
					"judul_berita"	=> $request->judul_berita,
					"judul_seo"		=> Helper::judul_seo($request->judul_berita),
					"id_kategori"	=> $request->id_kategori,
					"isi_berita"	=> $request->isi_berita,
					"yt"			=> $request->yt,
					"status"		=> $request->status
					);	
			$img = "";
			if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
		 
			   // if validation fails
			   if($validator->fails()) {
				   $img = "\n=>Foto Tidak dapat di Upload";
			   }else{
				\File::delete(public_path('assets/images/berita/'.$berita->foto));
				$file->move(public_path('/assets/images/berita/'), $file->getClientOriginalName());
				   $beritaArr["foto"] =  $file->getClientOriginalName(); 
			   }
			}
		if($berita->update($beritaArr)){
			return redirect('/admin/kelola_berita')->with(['info'=>'Berhasil Merubah Berita'.$img]);
		}
		return redirect('/admin/kelola_berita')->with(['error'=>'Tidak dapat merubah berita']);
	}
	public function proses_tambah_kategori($kat, $id){
		if($id == 0)
			if(Kategori::create(["kategori"=>$kat])){
				\Session::flash('info_kat', 'Kategori Berhasil Ditambahkan');
				echo json_encode(["stat"=>200, "mess"=>"Kategori Berhasil Ditambahkan"]);
			}else{
				echo json_encode(["stat"=>500, "mess"=>"Tidak dapat menambah kategori"]);
			}
		else{
			$berita = Kategori::findOrFail($id);
			if($berita->update(['kategori' => $kat])){
				return json_encode(["stat"=>200, "mess"=>"Kategori Berhasil Dirubah"]);
			}else{
				return json_encode(["stat"=>500, "mess"=>"Tidak dapat Merubah kategori"]);
			}
		}
			
	}
	public function proses_hapus_kategori($id){
		$cekBerita = Berita::where('id_kategori', $id)->count();
		if($cekBerita >= 1){
			return json_encode(["stat"=>500, "mess"=>"Kategori Sedang digunakan berita"]);
		}else{
			Kategori::findOrFail($id)->delete();
			return json_encode(["stat"=>200, "mess"=>"Kategori Berhasil Dihapus"]);
		}
		return json_encode(["stat"=>500, "mess"=>"Kategori Gagal Dihapus"]);
	}
	public function cek_judul_berita($judul, $update){
		if($update)
			if(Berita::findOrfail($update)->judul_seo == Helper::judul_seo($judul))
				return json_encode(["res"=>200]);
		if(Berita::where('judul_seo', Helper::judul_seo($judul))->count() == 0)
			return json_encode(["res"=>200]);
		return json_encode(["res"=>500]);
	}
}
