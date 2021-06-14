<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    { 
        $uname = session('username');
        return view('home.index')->with('uname', $uname);
    }
}
