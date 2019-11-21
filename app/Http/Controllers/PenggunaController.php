<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class PenggunaController extends Controller
{
	public function index(){
		return view('Admin.dashboard');
	}

	public function show()
	{
		$menu = Menu::all();

		return view('Admin.menu_list', compact('menu'));
	}

	public function create(Request $request)
    {
        /*
        parent, nama_menu, link, status
        */
        $menu_create = array(
            'parent' => $request->parent,
            'nama_menu' => $request->nama_menu,
            'link' => $request->link,
            'status' => $request->status,
            'urutan' => $request->urutan
        );

        $menu = Menu::all();
        if(Menu::create($menu_create))
        {
            return view('Admin.menu_list', compact('menu'));
        }
        else
        {
            return view('Admin.create_menu')->with(['message'=> 'Gagal membuat menu !']);
        }
    }

    //Edit Menu
    public function edit(Request $request)
    {
        $id = $request->id_menu;   
        $update_menu = Menu::findOrFail($id);
        
        if($menu)
        {
            $update_menu->update($request->all());
            $menu = Menu::all();
            return view('Admin.menu_list', compact('menu'));
        }
        else
        {
            $menu = Menu::all();
            return view('Admin.menu_list', compact('menu'));
        }
    }

    //Delete Menu
    public function destroy(Request $requets)
    {
        $id = $request->id_menu;

        $deleteMenu = Menu::destroy($id);
        $menu = Menu::get();

        if($deleteMenu)
        {
            return view('Admin.menu_list', compact('menu'));
        }
        else
        {
            return view('Admin.menu_list', compact('menu'))->with(['message' => 'Gagal delete menu']);
        }
    }
}