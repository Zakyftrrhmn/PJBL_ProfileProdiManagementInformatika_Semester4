<?php

use App\Http\Controllers\API\AkreditasiController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\InformasiController;
use App\Http\Controllers\API\KalenderAkademikController;
use App\Http\Controllers\API\KaryaMahasiswaController;
use App\Http\Controllers\API\KurikulumController;
use App\Http\Controllers\API\LaporanKepuasanController;
use App\Http\Controllers\API\MisiController;
use App\Http\Controllers\API\PrestasiMahasiswaController;
use App\Http\Controllers\API\ProfileKelulusanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\VisiController;

Route::get('visi', [VisiController::class, 'index']);
Route::get('misi', [MisiController::class, 'index']);
Route::get('karya_mahasiswa', [KaryaMahasiswaController::class, 'index']);
Route::get('informasi', [InformasiController::class, 'index']);
Route::get('kalender_akademik', [KalenderAkademikController::class, 'index']);
Route::get('kurikulum', [KurikulumController::class, 'index']);
Route::get('akreditasi', [AkreditasiController::class, 'index']);
Route::get('profile_lulusan', [ProfileKelulusanController::class, 'index']);
Route::get('laporan_kepuasan', [LaporanKepuasanController::class, 'index']);
Route::get('gallery', [GalleryController::class, 'index']);
Route::get('prestasi_mahasiswa', [PrestasiMahasiswaController::class, 'index']);
