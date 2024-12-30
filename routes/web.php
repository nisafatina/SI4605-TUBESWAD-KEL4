<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PemesananController;
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

//Route Menu

Route::get('/menu', [MenuController::class, 'index'])->name('menus.index'); // Tampilkan semua menu
Route::get('/menu/create', [MenuController::class, 'create'])->name('menus.create'); // Form tambah menu
Route::post('/menu', [MenuController::class, 'store'])->name('menus.store'); // Simpan menu baru
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menus.show'); // Tampilkan detail menu
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit'); // Form edit menu
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menus.update'); // Update menu
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menus.destroy'); // Hapus menu
Route::get('/menus/download-pdf', [MenuController::class, 'downloadPdf'])->name('menus.downloadPdf');

//Route untuk menampilkan daftar restoran ke dashboard
Route::get('/', [RestoranController::class, 'dashboard'])->name('dashboard');
Route::get('/restoran/{id}/menu', [RestoranController::class, 'showMenu'])->name('restoran.showMenu');
Route::get('/restoran/{id}/panggil-qris', [RestoranController::class, 'panggilQris'])->name('restoran.panggilQris');
Route::get('/menu/{id}/order', [MenuController::class, 'order'])->name('menu.order');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

// Menambah menu ke keranjang
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// Menampilkan halaman checkout
Route::get('/checkout/{id}', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/checkout', [PemesananController::class, 'store'])->name('checkout.store');
Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan/success/{id}', [PemesananController::class, 'success'])->name('pemesanan.success');
Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::get('/pemesanan/download/{id}', [PemesananController::class, 'downloadBill'])->name('pemesanan.downloadBill');

//Route Feedback
Route::resource('feedback', FeedbackController::class);
