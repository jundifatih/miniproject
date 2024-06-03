<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::get('/', [HomeController::class, 'getHome'])->name('get_home');
Route::get('/home', [HomeController::class, 'Home'])->name('home');
Route::get('/registrasi', [UserController::class, 'getRegister'])->name('get_register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'getLogin'])->name('get_login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/MyProfile', [UserController::class, 'myProfile'])->name('my_profile');
Route::get('/formPost', [PostController::class, 'formPost'])->name('form_post');
Route::post('/formAdd', [PostController::class, 'formAdd'])->name('form_add');
Route::get('/seePost', [PostController::class, 'seePost'])->name('see_post');

