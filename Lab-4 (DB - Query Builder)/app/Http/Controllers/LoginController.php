<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $user = DB::table('all_users')->where('username', $uname)
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
