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
        return view('user.list')->with('userList', $data);
    }

    public function details($id)
    {
        $file_path = storage_path().'/data.json';
        $contents = file_get_contents($file_path);
        $contentsDecoded = json_decode($contents, true);
        $data = $contentsDecoded['users'];
        return view('user.details')->with('id', $id)
                                   ->with('userList', $data);
    }

    public function edit($id)
    {
        $file_path = storage_path().'/data.json';
        $contents = file_get_contents($file_path);
        $contentsDecoded = json_decode($contents, true);
        $data = $contentsDecoded['users'];
        return view('user.edit')->with('id', $id)
                                   ->with('userList', $data);
    }

    public function verifyEdit($id, Request $req)
    {
        $uname = $req->name;
        $email = $req->email;

        //Get file path
        $file_path = storage_path().'/data.json';

        //Load the file
        $contents = file_get_contents($file_path);

        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);

        //Modify variables.
        for($i = 0; $i < sizeof($contentsDecoded['users']); $i++)
        {
            if($contentsDecoded['users'][$i]['id'] == $id)
            {
                $contentsDecoded['users'][$i]['username'] = $uname;
                $contentsDecoded['users'][$i]['email'] = $email;
            }
        }

        //Encode the array back into a JSON string.
        $json = json_encode($contentsDecoded);

        //Save the file.
        file_put_contents($file_path, $json);

        //Redirect to user list
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        //Get file path
        $file_path = storage_path().'/data.json';

        //Load the file
        $contents = file_get_contents($file_path);

        //Decode the JSON data into a PHP array.
        $contentsDecoded = json_decode($contents, true);

        //Modify variables.
        for($i = 0; $i < sizeof($contentsDecoded['users']); $i++)
        {
            if($contentsDecoded['users'][$i]['id'] == $id)
            {
                $contentsDecoded['users'][$i]['status'] = 0;
            }
        }

        //Encode the array back into a JSON string.
        $json = json_encode($contentsDecoded);

        //Save the file.
        file_put_contents($file_path, $json);

        //Redirect to user list
        return redirect()->route('user.index');
    }
}
