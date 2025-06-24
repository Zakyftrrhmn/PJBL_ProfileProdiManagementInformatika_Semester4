<?php

// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule; // Tambahkan ini jika belum ada

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php', // Ini adalah file routes/console.php
        api: base_path('routes/api.php'),
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    // Ini adalah bagian baru untuk scheduling di Laravel 11/12
    ->withSchedule(function (Schedule $schedule) {
        // Definisikan jadwal Anda di sini
        $schedule->command('campus:import-data')->dailyAt('03:00');
        // // Atau untuk pengujian:
        // $schedule->command('campus:import-data')->everyMinute();
    })
    ->create();
