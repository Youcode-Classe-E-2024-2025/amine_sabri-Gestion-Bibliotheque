<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');



// Route::get('/home', function () {
//     return "Bienvenue sur la page d'accueil !";
// })->name('home');