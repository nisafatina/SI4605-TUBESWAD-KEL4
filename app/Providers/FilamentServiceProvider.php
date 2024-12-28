<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Tentukan siapa yang dapat mengakses Filament
            Filament::registerMiddleware([
                'auth',        // Middleware autentikasi default Laravel
                'verified',    // (Opsional) Untuk memastikan email pengguna telah diverifikasi
            ]);
        });
    }
}
