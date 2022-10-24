<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login_register_controller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [login_register_controller::class, 'login'])->name('login_page')->middleware('alreadyloggedin');
Route::post('/login_user', [login_register_controller::class, 'login_user'])->name('login_user');

Route::get('/register', [login_register_controller::class, 'register'])->name('register_page')->middleware('alreadyloggedin');
Route::post('/register_user', [login_register_controller::class, 'register_user'])->name('register_user');

Route::get('/logout', [login_register_controller::class, 'logout'])->name('logout');

Route::get('/dashboard', [login_register_controller::class, 'dashboard'])->name('dashboard')->middleware('checklogin');