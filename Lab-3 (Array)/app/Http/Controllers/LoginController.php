<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = [
            ['id'=>1, 'username'=>'Alice', 'password'=>123, 'email'=>'alice@email.com'],
            ['id'=>2, 'username'=>'Bob','password'=>123, 'email'=>'bob@email.com'],
            ['id'=>3, 'username'=>'John','password'=>123, 'email'=>'john@email.com']
        ];
    }

    public function index()
    {
        return view('login.index');
    }

    public function verify(Request $req)
    {
        $uname = $req->username;
        $pass = $req->password;
        $data = $this->user;
        foreach($data as $item)
        {
            if($uname != "" && $pass != "" && $item['username'] == $uname && $item['password'] == $pass)
            {
                return redirect('/home');
            }
        }
        return redirect('/login');
    }
}
