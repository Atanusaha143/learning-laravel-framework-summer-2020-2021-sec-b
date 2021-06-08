<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateController extends Controller
{
    public function index()
    {
        return view('create.index');
    }

    public function create(Request $req) 
    {
        $uname = $req->name;
        $email = $req->email;
        $pass = $req->password;

        //Get file path
        $file_path = storage_path().'/data.json';

        //Load the file
        $contents = file_get_contents($file_path);

        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);

        //Get size of contentsDecoded
        $len = sizeof($contentsDecoded['users']);

        //Create variables.
        $contentsDecoded['users'][$len]['id']  = $len+1;
        $contentsDecoded['users'][$len]['username'] = $uname;
        $contentsDecoded['users'][$len]['password'] = $pass;
        $contentsDecoded['users'][$len]['email'] = $email;
        $contentsDecoded['users'][$len]['status'] = 1;

        //Encode the array back into a JSON string.
        $json = json_encode($contentsDecoded);

        //Save the file.
        file_put_contents($file_path, $json);

        //Redirect to user list
        return redirect('/user/list');
    }
}
