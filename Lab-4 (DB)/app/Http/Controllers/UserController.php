<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.list')->with('userList', $users);
    }

    public function details($id){
        $users = $this->getUserList();
        $user = '';
        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        return view('user.details')->with('user', $user);
    }

    public function create(){
        return view('user.create');
    }

    public function insert(Request $req){
        $users = $this->getUserList();
        $user = ['id'=>$req->id, 'name'=>$req->name, 'email'=>$req->email];
        array_push($users, $user);
        return view('user.list')->with('userList', $users);
    }

    public function edit($id){
        //find user by id from user list $user
        $user = '';
        $users = $this->getUserList();
        foreach($users as $u)
        {
            if($u['id'] == $id)
            {
                $user = $u;
                break;
            }
        }
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $req, $id){
        //craete new user array & add to list
        //new userList
        $users = $this->getUserList();
        for($i=0; $i<sizeof($users); $i++)
        {
            if($users[$i]['id'] == $id)
            {
                $users[$i]['name'] = $req->name;
                $users[$i]['email'] = $req->email;
                break;
            }
        }
        return view('user.list')->with('userList', $users);
    }

    public function delete($id){
        //confirm window
        //find user by id $user
        $user = '';
        $users = $this->getUserList();
        foreach($users as $u)
        {
            if($u['id'] == $id)
            {
                $user = $u;
                break;
            }
        }
        return view('user.delete')->with('user', $user);
    }

    public function destroy($id){
        //remove user form list
        //create new list & display
        $users = array();
        $old_users = $this->getUserList();
        foreach($old_users as $u)
        {
            if($u['id'] != $id)
            {
                array_push($users,$u);
            }
        }
        return view('user.list')->with('userList', $users);
    }


    public function getUserList(){
        return [
            ['id'=>1, 'name'=>'Alice', 'email'=>'alice@email.com'],
            ['id'=>2, 'name'=>'Bob', 'email'=>'bob@email.com'],
            ['id'=>3, 'name'=>'John', 'email'=>'john@email.com']
        ];
    }
}
