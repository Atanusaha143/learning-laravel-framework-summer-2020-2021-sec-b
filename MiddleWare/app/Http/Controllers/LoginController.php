<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $check = session()->has('login');
        $msg = session()->has('loginFailedMessage');
        if($check)
        {
            return redirect('/home');
        }
        else if($msg)
        {
            $info = session()->get('loginFailedMessage');
            return view('login.index')->with('msg', $info);
        }
        else
        {
            return view('login.index')->with('msg','');
        }
    }

    public function verify(Request $req)
    {
        $uname = $req->username;
        $pass = $req->password;

        //Get file path
        $file_path = storage_path().'/data.json';
        //Load the file
        $contents = file_get_contents($file_path);
        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);
        //Get specific array
        $data = $contentsDecoded['users'];

        for($i = 0; $i < sizeof($data); $i++)
        {
            if($uname != "" && $pass != "" && $data[$i]['username'] == $uname && $data[$i]['password'] == $pass && $data[$i]['status'] == 1)
            {
                $req->session()->put('login','1');
                $req->session()->put('username',$uname);
                return redirect()->route('home.index');
            }
        }
        $req->session()->flash('loginFailedMessage','Invalid User');
        return redirect('/login');
    }
}
