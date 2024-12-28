<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;  // Pastikan untuk menambahkan import FeedbackController

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
});

// Route untuk login dan register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Route untuk proses login dan register
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout']);


Route::resource('feedback', FeedbackController::class);