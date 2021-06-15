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
 Route::get('/user/list/download',[UserController::class, 'downloadPDF']);

// Logout
Route::get('/logout',[LogoutController::class, 'index']);