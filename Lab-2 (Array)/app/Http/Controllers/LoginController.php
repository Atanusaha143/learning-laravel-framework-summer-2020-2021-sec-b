<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function verify(Request $req)
    {
        $uname = $req->username;
        $pass = $req->password;
            if($uname != "" && $pass != "")
            {
                return redirect('/home');
            }
        return redirect('/login');
    }
}
