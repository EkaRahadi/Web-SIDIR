<?php

namespace App\Http\Controllers;

use \App\Console\Helper;
use \App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PenggunaController extends Controller
{
	public function index(){
		$data['judul'] = "Dashboard";
		$data['sub'] = "";
		$data['berita'] = \App\Berita::count();
		$data['user'] = \App\Pengguna::count();
		$data['label_data_statistik'] = array();
		$data['data_statistik'] = array();
		foreach(\App\Visitor::take(30)->groupby('created_at')->get() as $row){
			$data['label_data_statistik'][] = $row->created_at->format('d M');
			$data['data_statistik'][] = \App\Visitor::where('created_at', $row->created_at)->count();
		}
		//dd($data);
		return view('Admin.dashboard', $data);
	}
	public function ckeditor_upload(Request $request){
		if($request->hasFile('upload')){
			$file = $request->file('upload');
			$filename = $file->getClientOriginalName();
            $file->move(storage_path().'/images/', $filename);
            $url = public_path() .'/images/' . $filename;
			
			$CKEditorFuncNum = $request->input('CKEditorFuncNum');
			$response = "<script>window.parent.CKEDITOR.tools.callfunction($CKEditorFuncNum, '$url', 'File Terupload')</script>";
			
			@header('Content-type: text/html; charset=utf-8');
			echo $response;
		}
	}
	public function data_pengguna(){
		$data['judul'] = "Data Pengguna";
		$data['sub'] = "
						<li><a href='/admin/data_pengguna'>Data Pengguna</a></li>
						";
		$data['users'] = Pengguna::select('id_pengguna','foto', 'no_id', 'nama', 'username', 'level')->get();
		return view('Admin.data_pengguna', $data);
	
	}
	public function pengguna(Request $request, $act){
		switch($act){
			case "tambah":
				$data['judul'] = "Tambah Pengguna";
				$data['sub'] = "
								<li><a href='#'>Tambah Pengguna</a></li>
								";
				if($request->_token){
					$userArr = [
						"no_id" 	=> $request->no_id,
						"nama" 		=> $request->nama,
						"username"	=> $request->username,
						"alamat"	=> $request->alamat,
						"nope"		=> $request->nope,
						"email"		=> $request->email,
						"level"		=> $request->level
						];
				if(trim($request->password) != null)
				  $valid = Validator::make($request->all(),[
					'password' => 'min:6|required_with:kon_pas|same:kon_pas'
					]);
				if(!$valid->fails()) 
					$userArr["password"] = $request->password;
				else
					return redirect('/admin/my_profil')->with(['warning'=>'Password Tidak Sama']);
				
				if($file   =   $request->file('foto')) {
				$validator      =   Validator::make($request->all(),
				   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
		 
			   // if validation fails
			   if($validator->fails()) {
				   \Session::flash(['warning' => 'Foto Tidak bisa diupload']);
			   }else{
				   //non-functional
				   $fto = Pengguna::where("foto", $file->getClientOriginalName())->get()->count() > 0 ? rand()."-".$file->getClientOriginalName():$file->getClientOriginalName();
				   //
				   $file->move(public_path('/assets/images/pengguna/'), $fto);
				   $userArr["foto"] =  $fto; 
			   }
			   if(Pengguna::create($userArr))
				   return redirect('/admin/data_pengguna')->with(['info' =>'Pengguna baru berhasil ditambahkan']);
				else
				   return redirect('/admin/data_pengguna')->with(['error' =>'Pengguna Tidak Dapat ditambahkan']);
				
					
			}
				}
				break;
		//=============================================================================//		
			case "edit":
				$data['judul'] = "Edit Pengguna";
				$data['user'] = Pengguna::findOrFail($request->id_pengguna);
				$data['sub'] = "
								<li><a href='#'>Edit Pengguna</a></li>
								";
				if($request->_token){
					$userArr = [
						"no_id" 	=> $request->no_id,
						"nama" 		=> $request->nama,
						"username"	=> $request->username,
						"alamat"	=> $request->alamat,
						"nope"		=> $request->nope,
						"email"		=> $request->email,
						"level"		=> $request->level
						];
				if(trim($request->password) != null){
					$valid = Validator::make($request->all(),[
						'password' => 'min:6|required_with:kon_pas|same:kon_pas'
					]);
					if(!$valid->fails()) 
						$userArr["password"] = $request->password;
					else
						return redirect(url()->current().'?id_pengguna='.$request->id_pengguna)->with(['warning'=>'Password Tidak Sama']);
				}
				if($file   =   $request->file('foto')) {
					$validator      =   Validator::make($request->all(),
					   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
					if($validator->fails()) {
					   \Session::flash(['warning' => 'Foto Tidak bisa diupload']);
					}else{
						\File::delete(public_path('assets/images/pengguna/'.$data['user']->foto));
						$file->move(public_path('/assets/images/pengguna/'), $file->getClientOriginalName());
						$userArr["foto"] =  $file->getClientOriginalName(); 
					}
			    }
				$data['user']->update($userArr);
				return redirect('/admin/data_pengguna')->with(['info'=>'Pengguna berhsil dirubah']);
				}
				break;
		//=============================================================================//		
			case "hapus":
				$pengguna = Pengguna::findOrFail($request->id_pengguna);
				\File::delete(public_path('assets/images/pengguna/'.$pengguna->foto));
				if($pengguna->delete())
					return json_encode(["stat"=>200, "mess"=>"Pengguna Berhasil Dihapus"]);
				else
					return json_encode(["stat"=>500]);
				
				break;
			case "level":
				$lv = $request->set == 1 ? "Administrator":"Jurnalis";
				$pengguna = Pengguna::findOrFail($request->id_pengguna);
				if($pengguna->update(["level"=>$request->set]))
					return json_encode(["stat"=>200, "mess"=>"Pengguna ini Sekarang ".$lv]);
				return json_encode(["stat"=>500]);
				break;
			default:
				return redirect('/admin/data_pengguna');
				break;
		}
		return view("admin.tambah_pengguna", $data);
	}
	public function lihat_profil(Request $request){
		$data['user'] = Pengguna::findOrFail(\Session::get("logged_in")[0]);
		if($request->_token){
		  if(trim($data['user']->username) != trim($request->username)) if(Pengguna::where('username', $request-username)->count() > 0) return redirect('/admin/my_profil')->with(['warning'=>'Username tidak dapat digunakan']);
			$userArr = [
						"no_id" 	=> $request->no_id,
						"nama" 		=> $request->nama,
						"username"	=> $request->username,
						"alamat"	=> $request->alamat,
						"nope"		=> $request->nope,
						"email"		=> $request->email
						];
		  	
		  if(trim($request->password) != null){
			  $valid = Validator::make($request->all(),[
				'password' => 'min:6|required_with:kon_pas|same:kon_pas'
				]);
			if(!$valid->fails()) 
				$userArr["password"] = $request->password;
			else
				return redirect('/admin/my_profil')->with(['warning'=>'Password Tidak Sama']);
		  }
		  if($file   =   $request->file('foto')) {
					$validator      =   Validator::make($request->all(),
					   ['foto'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);
					if($validator->fails()) {
					   \Session::flash(['warning' => 'Foto Tidak bisa diupload']);
					}else{
						\File::delete(public_path('assets/images/pengguna/'.$data['user']->foto));
						$file->move(public_path('/assets/images/pengguna/'), $file->getClientOriginalName());
						$userArr["foto"] =  $file->getClientOriginalName(); 
					}
			    }
		  if($data['user']->update($userArr))
			return redirect('/admin/my_profil')->with(['info'=>'Profil Berhasil Dirubah']);
		}
		$data['judul'] = "Profil Pengguna";
		$data['sub'] = "
						<li><a href='#'>Profil Pengguna</a></li>
						";
		return view("admin.lihat_profil", $data);
	}
}
	
