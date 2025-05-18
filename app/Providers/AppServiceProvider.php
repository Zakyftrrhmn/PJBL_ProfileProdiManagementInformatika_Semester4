<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Terapkan ke semua view yang dirender
        View::composer('*', function ($view) {
            // Cegah halaman dikembalikan dari cache browser
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");

            // (Opsional) Kalau ingin lebih ketat: redirect jika user belum login
            // Bisa kamu sesuaikan atau dihapus kalau tidak dibutuhkan
            if (!Auth::check() && request()->is('deskripsi*')) {
                abort(403, 'Akses ditolak, Anda harus login');
            }
        });
    }
}
