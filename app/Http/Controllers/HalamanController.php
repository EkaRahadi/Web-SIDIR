<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Halaman;
use \App\Console\Helper;
use Illuminate\Support\Facades\Validator;

class HalamanController extends Controller
{
    //
	
	public function index(){
		$data['judul'] = "Data Halaman";
		$data['sub'] = "
						<li><a href='/admin/halaman'>Data Halaman</a></li>
						";
		$data['pages'] = Halaman::all();
		return view('Admin.halaman', $data);
	
	}
	public function tambah(Request $request){
		if($request->judul_halaman){
			$halArr = ["judul_halaman"	=>	$request->judul_halaman,
					   "judul_seo"		=>	Helper::judul_seo($request->judul_halaman),
					   "isi_halaman"	=>	$request->isi_halaman,
					   "yt"				=>	$request->yt,
					   "status"			=>	$request->status
						];
			if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
			   if(!$validator->fails()) {
				   //non-functional
				   $fto = Halaman::where("foto", $file->getClientOriginalName())->get()->count() > 0 ? rand()."-".$file->getClientOriginalName():$file->getClientOriginalName();
				   //
					$file->move(public_path('/assets/images/halaman/'), $fto);
					$halArr["foto"] =  $fto; 
			   }
			}
			if(Halaman::create($halArr))
				return redirect('/admin/halaman')->with(['info' =>'Halaman baru berhasil ditambahkan']);
			else
			   return redirect('/admin/halaman')->with(['error' =>'Halaman Tidak Dapat ditambahkan']);
				
		}else{
			$data['judul'] = "Tambah Halaman";
			$data['sub'] = "
							<li><a href='/admin/halaman'>Data Halaman</a></li>
							<li><a href='#'>Tambah Halaman</a></li>
							";
			return view('Admin.tambah_halaman', $data);
		}
	}
	public function edit(Request $request, $id_halaman){
		if($request->id_halaman){
			$halArr = ["judul_halaman"	=>	$request->judul_halaman,
					   "judul_seo"		=>	Helper::judul_seo($request->judul_halaman),
					   "isi_halaman"	=>	$request->isi_halaman,
					   "yt"				=>	$request->yt,
					   "status"			=>	$request->status
						];
			if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
			   if(!$validator->fails()) {
				   //non-functional
				   $fto = Halaman::where("foto", $file->getClientOriginalName())->get()->count() > 0 ? rand()."-".$file->getClientOriginalName():$file->getClientOriginalName();
				   //
					$file->move(public_path('/assets/images/halaman/'), $fto);
					$halArr["foto"] =  $fto; 
			   }
			}
			$halaman = Halaman::findOrfail($request->id_halaman);
			if($halaman->update($halArr))
				return redirect('/admin/halaman')->with(['info' =>'Halaman berhasil dirubah']);
			else
			   return redirect('/admin/halaman')->with(['error' =>'Halaman Tidak Dapat dirubah']);
				
		}else{
			$data['judul'] = "Edit Halaman";
			$data['sub'] = "
							<li><a href='/admin/halaman'>Data Halaman</a></li>
							<li><a href='#'>Edit Halaman</a></li>
							";
			$data['page'] = Halaman::findOrfail($id_halaman);
			return view('Admin.tambah_halaman', $data);
		}
	}
	public function cek_judul($judul, $update){
		if($update)
			if(Halaman::findOrfail($update)->judul_seo == Helper::judul_seo($judul))
				return json_encode(["res"=>200]);
		if(Halaman::where('judul_seo', Helper::judul_seo($judul))->count() == 0)
			return json_encode(["res"=>200]);
		return json_encode(["res"=>500]);
	}
	public function func_halaman(Request $request, $act){
		switch($act){
			case "visibilitas":
				$s = Halaman::findOrFail($request->id_halaman);
				$mes = "Disembunyikan"; if($request->set == "YA") $mes = "Dipublikasikan";
				if($s->update(["status"=>$request->set]))
					return json_encode(["stat"=>200, "mess"=>"Halaman Saat Ini ".$mes]);
				return json_encode(["stat"=>500]);
				break;
			case "hapus":
				if(Halaman::findOrFail($request->id_halaman)->delete())
					return json_encode(["stat"=>200, "mess"=>"Halaman Berhasil Dihapus"]);
				return json_encode(["stat"=>500]);
				break;
			default:
				break;
		}
	}
}
