<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/login', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::resource('books', BookController::class);



Route::middleware('auth')->group(function () {
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('/loans/{book}', [LoanController::class, 'store'])->name('loans.store');
    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
});

