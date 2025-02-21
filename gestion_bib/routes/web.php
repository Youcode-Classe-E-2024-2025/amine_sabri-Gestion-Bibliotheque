<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [BookController::class, 'index'])->name('books.index');
// Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/login', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

Route::resource('books', BookController::class);


// Route::get('/home', function () {
//     return "Bienvenue sur la page d'accueil !";
// })->name('home');