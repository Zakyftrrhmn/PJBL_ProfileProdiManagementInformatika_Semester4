<?php

use App\Http\Controllers\API\AkreditasiController;
use App\Http\Controllers\API\DosenController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\HubungiKamiController;
use App\Http\Controllers\API\InformasiController;
use App\Http\Controllers\API\KalenderAkademikController;
use App\Http\Controllers\API\KaryaMahasiswaController;
use App\Http\Controllers\API\KurikulumController;
use App\Http\Controllers\API\LaporanKepuasanController;
use App\Http\Controllers\API\MisiController;
use App\Http\Controllers\API\PrestasiMahasiswaController;
use App\Http\Controllers\API\ProfileKelulusanController;
use App\Http\Controllers\API\FrontSideController;
use App\Http\Controllers\API\KontakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\VisiController;
use App\Http\Controllers\API\InformasiUmumController;

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

Route::get('hubungi_kami', [HubungiKamiController::class, 'index']);
Route::post('hubungi_kami', [HubungiKamiController::class, 'store']);

Route::get('kontak', [KontakController::class, 'index']);

Route::get('frontside', [FrontSideController::class, 'index']);

Route::get('dosen', [DosenController::class, 'index']);

Route::get('informasi_umum', [InformasiUmumController::class, 'index']);
