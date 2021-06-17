<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        $check = session()->has('login');
        if($check)
        {
            session()->forget('login');
        }
        return redirect()->route('home.index');
    }
}
