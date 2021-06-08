<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = [
            ['id'=>1, 'name'=>'Alice', 'email'=>'alice@email.com'],
            ['id'=>2, 'name'=>'Bob', 'email'=>'bob@email.com'],
            ['id'=>3, 'name'=>'John', 'email'=>'john@email.com']
        ];
    }
    public function index()
    {
        $data = $this->user;
        return view('user.list')->with('userList', $data);
    }

    public function details($id)
    {
        $data = $this->user;
        return view('user.details')->with('id', $id)
                                   ->with('userList', $data);
    }
}
