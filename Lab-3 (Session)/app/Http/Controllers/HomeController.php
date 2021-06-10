<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // Ways to pass data
        // 1.
        // return view('home.index', compact('name', 'id'));
        // 2.
        // return view('home.index', ['name'=>'admin','id'=>'1']);
        // 3.
        // return view('home.index')->with('name','admin')
        //                          ->with('id','1');
        // 4.
        //  return view('home.index')->withName('admin')
        //                           ->withId('1'); 

        $check = session()->has('login'); // get session value
        if($check) // if session exists
        {
            $uname = session('username');
            return view('home.index')->with('uname', $uname); // then redirect to home
        }
        else // otherwise
        {
            return redirect('/login'); // redirect to login
        }
    }
}
