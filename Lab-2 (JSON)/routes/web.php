<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/login', function () {
//     return view('login.index');
// });

//Route::get('/login','App\Http\Controllers\LoginController@index'); 1st Way where no need include 'use'

// Login
Route::get('/login',[LoginController::class, 'index']); // 2nd way where including 'use' is must
Route::post('/login',[LoginController::class, 'verify']);


// Home
Route::get('/home',[HomeController::class, 'index']);

// User List
 Route::get('/user/list',[UserController::class, 'index']);
 Route::get('/user/details/{id}',[UserController::class, 'details']);
 Route::get('/user/edit/{id}',[UserController::class, 'edit']);
 Route::post('/user/edit/{id}',[UserController::class, 'verifyEdit']);
 Route::get('/user/delete/{id}',[UserController::class, 'delete']);

 // Create User
 Route::get('/user/create',[CreateController::class, 'index']);
 Route::post('/user/create',[CreateController::class, 'create']);

// Logout
Route::get('/logout',[LogoutController::class, 'index']);