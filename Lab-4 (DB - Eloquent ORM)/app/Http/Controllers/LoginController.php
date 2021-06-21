<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        //$results = User::all(); // returns object of that specfic table

        $user = User::where('username', $uname)
                    ->where('password', $pass)
                    ->first();
        if($user)
        {
            return redirect('/home');
        }
        else
        {
            return redirect('/login');
        }
    }
}
