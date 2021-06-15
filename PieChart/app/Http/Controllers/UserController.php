<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Get file path
        $file_path = storage_path().'/data.json';
        //Load the file
        $contents = file_get_contents($file_path);
        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);
        //Get specific array
        $data = $contentsDecoded['users'];
        return view('user_list')->with('userList', $data);
    }
}
