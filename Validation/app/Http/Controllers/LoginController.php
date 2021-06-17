<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserRequest;

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

    public function verify(UserRequest $req)
    //public function verify(Request $req)
    {

        // Validation 1
        /*$validation = Validator::make($req->all(), [
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ]);
        
        if($validation->fails())
        {
            return redirect()->route('login.index')->with('errors', $validation->errors());
        }*/

        // Validation 2
        /*$validation = Validator::make($req->all(), [
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ]);
        
        if($validation->fails())
        {
            return back()->with('errors', $validation->errors());
        }*/

        // Validation 3
        /*$this->validate($req, [
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ])->validate();*/

        // Validation 4
        /*$req->validate([
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ])->validate();*/
        
        $validation = Validator::make($req->all(), [
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ]);
        
        if($validation->fails())
        {
            return back()->with('errors', $validation->errors())->withInput();
        }

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
        return redirect()->route('login.index');
        
    }
}
