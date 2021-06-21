<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('all_users')->get();
        return view('user.list')->with('userList', $users);
    }

    public function details($id)
    {
        $user = DB::table('all_users')->where('user_id', $id)->first();
        return view('user.details')->with('user', $user);
    }

    public function create()
    {
        return view('user.create');
    }

    public function insert(Request $req)
    {
        DB::table('all_users')->insert(
            ['username' => $req->username, 'password' => $req->password, 'email' => $req->email, 'status' => $req->status, 'type' => $req->type]
        );
        return redirect('user/list');
    }

    public function edit($id)
    {
        $user = DB::table('all_users')->where('user_id', $id)->first();
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $req, $id)
    {
        DB::table('all_users')->where('user_id', $id)
                          ->update(['username' => $req->username, 'email' => $req->email]);
        
        return redirect('user/list');
    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('user.delete')->with('user', $user);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user/list');
    }
}
