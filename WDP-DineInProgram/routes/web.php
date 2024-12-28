<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view ('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Route untuk proses login dan register
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout']);

// Route untuk Admin
Route::get('/index', [AuthController::class, 'index'])->name('auth.index');
Route::get('/auth/{admin}', [AuthController::class, 'show'])->name('auth.show');
Route::get('/auth/{admin}/edit', [AuthController::class, 'edit'])->name('auth.edit');
Route::put('/auth/{admin}', [AuthController::class, 'update'])->name('auth.update');
Route::delete('/auth/{admin}', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::get('/admin/export-pdf', [AuthController::class, 'exportPdf'])->name('exportpdf.index');

// Route Restoran
Route::get('restoran', [RestoranController::class, 'index'])->name('restoran.index');
Route::get('restoran/create', [RestoranController::class, 'create'])->name('restoran.create');
Route::post('restoran', [RestoranController::class, 'store'])->name('restoran.store');
Route::get('restoran/{restoran}', [RestoranController::class, 'show'])->name('restoran.show');
Route::get('restoran/{restoran}/edit', [RestoranController::class, 'edit'])->name('restoran.edit');
Route::put('restoran/{restoran}', [RestoranController::class, 'update'])->name('restoran.update');
Route::delete('restoran/{restoran}', [RestoranController::class, 'destroy'])->name('restoran.destroy');

// Route Feedback
Route::resource('feedback', FeedbackController::class);