<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\KalenderAkademikController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\ModulPerkuliahanController;
use App\Http\Controllers\ProfileKelulusanController;
use App\Http\Controllers\SilabusController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('/deskripsi', DeskripsiController::class);
Route::resource('/vis_misi', VisiMisiController::class);
Route::resource('/kurikulum', KurikulumController::class);
Route::resource('/profile_kelulusan', ProfileKelulusanController::class);
Route::resource('/dosen', DosenController::class);
Route::resource('/modul_perkuliahan', ModulPerkuliahanController::class);
Route::resource('/silabus', SilabusController::class);
Route::resource('/kalender_akademik', KalenderAkademikController::class);
Route::resource('/hubungi_kami', HubungiKamiController::class);
Route::resource('/artikel', ArtikelController::class);
Route::resource('/kategori', KategoriController::class);
