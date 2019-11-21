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
}
