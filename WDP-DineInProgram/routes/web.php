<?php

use Illuminate\Support\Facades\Route;

// Route tunggal dengan logika kondisi
Route::get('/', function () {
    $showStarterPage = true; // Ganti dengan kondisi yang sesuai
    if ($showStarterPage) {
        return view('layouts.index');
    }
    return view('layouts.starter-page');
});
