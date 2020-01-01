<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Halaman;
use \App\Menu;

class MenuController extends Controller
{
    //
	public function index(){
		$data['judul'] = "Data Menu";
		$data['sub'] = "
						<li><a href='/admin/menu'>Data Menu</a></li>
						";
		$data['menu'] = Menu::all();
		return view('Admin.menu', $data);
	
	}
	
	public function tambah(){
		$data['judul'] = "Data Menu";
		$data['sub'] = "
						<li><a href='/admin/menu'>Data Menu</a></li>
						<li><a href='/admin/tambah_menu'>Tambah Menu</a></li>
						";
		$data['pages'] = Halaman::select('judul_seo')->get();
		$data['menus'] = Menu::all();
		return view('Admin.tambah_menu', $data);
	}
	public function edit($id_menu){
		$data['judul'] = "Data Menu";
		$data['sub'] = "
						<li><a href='/admin/menu'>Data Menu</a></li>
						<li><a href='#'>Edit Menu</a></li>
						";
		$data['menus'] = Menu::all();
		$data['pages'] = Halaman::select('judul_seo')->get();
		$data['menu'] = Menu::findOrFail($id_menu);
		return view('Admin.tambah_menu', $data);
	}
	public function funct_menu(Request $request, $act){
		switch($act){
			case "visibilitas":
				$s = Menu::findOrFail($request->id_menu);
				$mes = "Disembunyikan"; if($request->set == "a") $mes = "Ditampilkan";
				if($s->update(["status"=>$request->set]))
					return json_encode(["stat"=>200, "mess"=>"Menu Saat Ini ".$mes]);
				return json_encode(["stat"=>500]);
				break;
			case "hapus":
				if(Menu::findOrFail($request->id_menu)->delete())
					return json_encode(["stat"=>200, "mess"=>"Menu Berhasil Dihapus"]);
				return json_encode(["stat"=>500]);
				break;
			default:
				break;
		}
	}
	public function proses_tambah_edit(Request $request){
		$menu = array("parent"=>$request->parent,
						"nama_menu"=>$request->nama_menu,
						"link"=>$request->link,
						"status"=>$request->aktivasi,
						"urutan"=>$request->urutan?$request->urutan:0);
		if($request->id_menu){
			$row = Menu::findOrFail($request->id_menu);
			if($row->update($menu))
				return redirect('/admin/menu')->with(['info'=>'Berhasil Edit Menu']);
		}else
			if(Menu::create($menu))
				return redirect('/admin/menu')->with(['info'=>'Berhasil Tambah Menu']);
		return redirect('/admin/menu')->with(['error'=>'Terjadi Kesalahan']);
	}
}
