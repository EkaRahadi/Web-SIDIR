<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{
    public function index(){
        
        return view('berita');
    }
}
