<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use \App\Console\Helper;
class AdminHPController extends Controller
{
    //
	
	public function index(){
		$data['judul'] = "Kelola Halaman Utama";
		$data['sub'] = "
						<li><a href='/admin/halaman'>Halaman Utama</a></li>
						";
		$data['foto_samping']=  "";
		if(Storage::disk('local')->exists('foto_samping.json'))
			$data['foto_samping'] = json_decode(Storage::disk('local')->get('foto_samping.json'))->foto;
		$data['slider'] = Slider::all();		
		return view('Admin.kelola_homepage', $data);
	
	}
	public function proses_tambah_slider(Request $request){
		if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
		 
			   // if validation fails
			   if(!$validator->fails()) {
				   $filename = $file->getClientOriginalName();
				   $file->move(public_path('/assets/images/slider/'), $filename);
				   Slider::create(["foto" => $filename, "alt" => $request->alt]);
				   return redirect('/admin/homepage')->with(['info'=>'Berhasil Tambah Gambar Slider']);
			   }
			}
			return redirect('/admin/homepage')->with(['error'=>'Tambah Gambar Slider Gagal']); 
	}
	public function proses_ganti_foto_samping(Request $request){
		if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
		 
			   // if validation fails
			   if(!$validator->fails()) {
				   \File::delete(public_path('assets/images/foto-samping/'.Helper::foto_samping()->foto));
				   $filename = $file->getClientOriginalName();
				   $file->move(public_path('/assets/images/foto-samping/'), $filename);
				   Storage::put('foto_samping.json', json_encode(["foto" => $filename]));
				   
				   return redirect('/admin/homepage')->with(['info'=>'Berhasil Ganti Foto Samping']);
			   }
			}
			return redirect('/admin/homepage')->with(['error'=>'Ganti Foto Sampingr Gagal']); 
	}
	public function proses_hapus_slider($id){
			$slider = Slider::findOrFail($id);
			if($slider->delete()){
			\File::delete(public_path('assets/images/slider/'.$slider->foto));
			echo json_encode(["stat"=>200, "mess"=>"Slider Berhasil Dihapus"]);
		}else{
			echo json_encode(["stat"=>500, "mess"=>"Terjadi Kesalahan Saat Hapus Slider"]);
		} 
	}
	
	
}
