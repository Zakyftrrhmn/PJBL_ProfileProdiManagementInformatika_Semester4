@extends('layouts.app') 
@section('title', 'Informasi Umum Prodi')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        @if (session('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>  
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif

        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                    <p class="text-sm text-slate-500 dark:text-slate-300">Kelola informasi umum program studi Anda.</p>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                {{-- Form selalu mengarah ke route update, karena kita hanya punya 1 data. --}}
                {{-- Jika data belum ada, controller akan membuatnya dengan firstOrNew(). --}}
                <form action="{{ route('admin.umum.update') }}" method="POST"> 
                    @csrf
                    @method('POST') {{-- Gunakan POST jika Anda tidak mengubah rute ke PUT/PATCH, ini akan tetap bekerja --}}

                    {{-- Informasi Struktur Organisasi --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Struktur Organisasi</h5>
                        
                        {{-- Nama Direktur --}}
                        <div class="mb-4">
                            <label for="nama_direktur" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Direktur</label>
                            <input type="text" id="nama_direktur" name="nama_direktur" 
                                value="{{ old('nama_direktur', $informasiUmum->nama_direktur ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_direktur') border-red-500 dark:border-red-500 @enderror">
                            @error('nama_direktur') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Nama Wakil Direktur --}}
                        <div class="mb-4">
                            <label for="nama_wakil_direktur" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Wakil Direktur</label>
                            <input type="text" id="nama_wakil_direktur" name="nama_wakil_direktur" 
                                value="{{ old('nama_wakil_direktur', $informasiUmum->nama_wakil_direktur ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_wakil_direktur') border-red-500 dark:border-red-500 @enderror">
                            @error('nama_wakil_direktur') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Nama Ketua Jurusan --}}
                        <div class="mb-4">
                            <label for="nama_ketua_jurusan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Ketua Jurusan</label>
                            <input type="text" id="nama_ketua_jurusan" name="nama_ketua_jurusan" 
                                value="{{ old('nama_ketua_jurusan', $informasiUmum->nama_ketua_jurusan ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_ketua_jurusan') border-red-500 dark:border-red-500 @enderror">
                            @error('nama_ketua_jurusan') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Nama Kaprodi --}}
                        <div class="mb-4">
                            <label for="nama_kaprodi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Kaprodi</label>
                            <input type="text" id="nama_kaprodi" name="nama_kaprodi" 
                                value="{{ old('nama_kaprodi', $informasiUmum->nama_kaprodi ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_kaprodi') border-red-500 dark:border-red-500 @enderror">
                            @error('nama_kaprodi') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Nama Koordinator Kampus --}}
                        <div class="mb-4">
                            <label for="nama_koordinator_kampus" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Koordinator Kampus</label>
                            <input type="text" id="nama_koordinator_kampus" name="nama_koordinator_kampus" 
                                value="{{ old('nama_koordinator_kampus', $informasiUmum->nama_koordinator_kampus ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_koordinator_kampus') border-red-500 dark:border-red-500 @enderror">
                            @error('nama_koordinator_kampus') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Statistik --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Statistik Prodi</h5>
                        
                        {{-- Total Mahasiswa --}}
                        <div class="mb-4">
                            <label for="total_mahasiswa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Total Mahasiswa</label>
                            <input type="number" id="total_mahasiswa" name="total_mahasiswa" 
                                value="{{ old('total_mahasiswa', $informasiUmum->total_mahasiswa ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('total_mahasiswa') border-red-500 dark:border-red-500 @enderror">
                            @error('total_mahasiswa') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Total Dosen --}}
                        <div class="mb-4">
                            <label for="total_dosen" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Total Dosen</label>
                            <input type="number" id="total_dosen" name="total_dosen" 
                                value="{{ old('total_dosen', $informasiUmum->total_dosen ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('total_dosen') border-red-500 dark:border-red-500 @enderror">
                            @error('total_dosen') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Total Alumni --}}
                        <div class="mb-4">
                            <label for="total_alumni" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Total Alumni</label>
                            <input type="number" id="total_alumni" name="total_alumni" 
                                value="{{ old('total_alumni', $informasiUmum->total_alumni ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('total_alumni') border-red-500 dark:border-red-500 @enderror">
                            @error('total_alumni') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Informasi Umum Prodi --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Informasi Umum Prodi</h5>
                        
                        {{-- Prodi Didirikan Tahun --}}
                        <div class="mb-4">
                            <label for="prodi_didirikan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tahun Prodi Didirikan</label>
                            <input type="number" id="prodi_didirikan" name="prodi_didirikan" 
                                value="{{ old('prodi_didirikan', $informasiUmum->prodi_didirikan ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('prodi_didirikan') border-red-500 dark:border-red-500 @enderror" min="1900" max="{{ date('Y') }}">
                            @error('prodi_didirikan') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Syarat Masuk --}}
                        <div class="mb-4">
                            <label for="syarat_masuk" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Syarat Masuk Prodi</label>
                            <textarea id="syarat_masuk" name="syarat_masuk" rows="4"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('syarat_masuk') border-red-500 dark:border-red-500 @enderror">{{ old('syarat_masuk', $informasiUmum->syarat_masuk ?? '') }}</textarea>
                            @error('syarat_masuk') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Kelas Karyawan --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="kelas_karyawan" name="kelas_karyawan" value="1"
                                {{ old('kelas_karyawan', $informasiUmum->kelas_karyawan ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('kelas_karyawan') border-red-500 dark:border-red-500 @enderror">
                            <label for="kelas_karyawan" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia Kelas Karyawan?</label>
                            @error('kelas_karyawan') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Gelar Diperoleh --}}
                        <div class="mb-4">
                            <label for="gelar_diperoleh" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Gelar yang Diperoleh</label>
                            <input type="text" id="gelar_diperoleh" name="gelar_diperoleh" 
                                value="{{ old('gelar_diperoleh', $informasiUmum->gelar_diperoleh ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('gelar_diperoleh') border-red-500 dark:border-red-500 @enderror">
                            @error('gelar_diperoleh') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Bisa Lanjut S1 --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="bisa_lanjut_s1" name="bisa_lanjut_s1" value="1"
                                {{ old('bisa_lanjut_s1', $informasiUmum->bisa_lanjut_s1 ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('bisa_lanjut_s1') border-red-500 dark:border-red-500 @enderror">
                            <label for="bisa_lanjut_s1" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah lulusan bisa melanjutkan ke S1?</label>
                            @error('bisa_lanjut_s1') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Mendukung MBKM --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="mendukung_mbkm" name="mendukung_mbkm" value="1"
                                {{ old('mendukung_mbkm', $informasiUmum->mendukung_mbkm ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('mendukung_mbkm') border-red-500 dark:border-red-500 @enderror">
                            <label for="mendukung_mbkm" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah Prodi Mendukung Program MBKM?</label>
                            @error('mendukung_mbkm') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Ada Pertukaran Pelajar --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_pertukaran_pelajar" name="ada_pertukaran_pelajar" value="1"
                                {{ old('ada_pertukaran_pelajar', $informasiUmum->ada_pertukaran_pelajar ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_pertukaran_pelajar') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_pertukaran_pelajar" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah ada program pertukaran pelajar?</label>
                            @error('ada_pertukaran_pelajar') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Fasilitas --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Fasilitas Prodi</h5>
                        
                        {{-- Fasilitas Prodi (Deskripsi umum) --}}
                        <div class="mb-4">
                            <label for="fasilitas_prodi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Deskripsi Fasilitas Umum Prodi</label>
                            <textarea id="fasilitas_prodi" name="fasilitas_prodi" rows="4"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('fasilitas_prodi') border-red-500 dark:border-red-500 @enderror">{{ old('fasilitas_prodi', $informasiUmum->fasilitas_prodi ?? '') }}</textarea>
                            @error('fasilitas_prodi') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Ada Labor --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_labor" name="ada_labor" value="1"
                                {{ old('ada_labor', $informasiUmum->ada_labor ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_labor') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_labor" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia Laboratorium?</label>
                            @error('ada_labor') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Ada Perpustakaan --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_perpustakaan" name="ada_perpustakaan" value="1"
                                {{ old('ada_perpustakaan', $informasiUmum->ada_perpustakaan ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_perpustakaan') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_perpustakaan" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia Perpustakaan?</label>
                            @error('ada_perpustakaan') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- WiFi Kampus --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="wifi_kampus" name="wifi_kampus" value="1"
                                {{ old('wifi_kampus', $informasiUmum->wifi_kampus ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('wifi_kampus') border-red-500 dark:border-red-500 @enderror">
                            <label for="wifi_kampus" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia WiFi Kampus?</label>
                            @error('wifi_kampus') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Akses LMS --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="akses_lms" name="akses_lms" value="1"
                                {{ old('akses_lms', $informasiUmum->akses_lms ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('akses_lms') border-red-500 dark:border-red-500 @enderror">
                            <label for="akses_lms" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia akses LMS (Learning Management System)?</label>
                            @error('akses_lms') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Layanan Disabilitas --}}
                        <div class="mb-4">
                            <label for="layanan_disabilitas" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Layanan untuk Mahasiswa Disabilitas</label>
                            <textarea id="layanan_disabilitas" name="layanan_disabilitas" rows="2"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('layanan_disabilitas') border-red-500 dark:border-red-500 @enderror">{{ old('layanan_disabilitas', $informasiUmum->layanan_disabilitas ?? '') }}</textarea>
                            @error('layanan_disabilitas') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Sistem Informasi Akademik --}}
                        <div class="mb-4">
                            <label for="sistem_informasi_akademik" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Sistem Informasi Akademik yang Digunakan</label>
                            <input type="text" id="sistem_informasi_akademik" name="sistem_informasi_akademik" 
                                value="{{ old('sistem_informasi_akademik', $informasiUmum->sistem_informasi_akademik ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('sistem_informasi_akademik') border-red-500 dark:border-red-500 @enderror">
                            @error('sistem_informasi_akademik') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Organisasi & Kegiatan --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Organisasi & Kegiatan Mahasiswa</h5>
                        
                        {{-- Daftar UKM --}}
                        <div class="mb-4">
                            <label for="daftar_ukm" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Daftar UKM yang Tersedia</label>
                            <textarea id="daftar_ukm" name="daftar_ukm" rows="3"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('daftar_ukm') border-red-500 dark:border-red-500 @enderror">{{ old('daftar_ukm', $informasiUmum->daftar_ukm ?? '') }}</textarea>
                            @error('daftar_ukm') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Himpunan Mahasiswa --}}
                        <div class="mb-4">
                            <label for="himpunan_mahasiswa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Himpunan Mahasiswa Prodi</label>
                            <input type="text" id="himpunan_mahasiswa" name="himpunan_mahasiswa" 
                                value="{{ old('himpunan_mahasiswa', $informasiUmum->himpunan_mahasiswa ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('himpunan_mahasiswa') border-red-500 dark:border-red-500 @enderror">
                            @error('himpunan_mahasiswa') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Ada KKN --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_kkn" name="ada_kkn" value="1"
                                {{ old('ada_kkn', $informasiUmum->ada_kkn ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_kkn') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_kkn" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah ada program KKN (Kuliah Kerja Nyata)?</label>
                            @error('ada_kkn') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Ada PKM --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_pkm" name="ada_pkm" value="1"
                                {{ old('ada_pkm', $informasiUmum->ada_pkm ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_pkm') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_pkm" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah ada Program Kreativitas Mahasiswa (PKM)?</label>
                            @error('ada_pkm') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Kegiatan Wirausaha --}}
                        <div class="mb-4">
                            <label for="kegiatan_wirausaha" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kegiatan Pendukung Kewirausahaan Mahasiswa</label>
                            <textarea id="kegiatan_wirausaha" name="kegiatan_wirausaha" rows="3"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('kegiatan_wirausaha') border-red-500 dark:border-red-500 @enderror">{{ old('kegiatan_wirausaha', $informasiUmum->kegiatan_wirausaha ?? '') }}</textarea>
                            @error('kegiatan_wirausaha') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Beasiswa & Bantuan --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Beasiswa & Bantuan</h5>
                        
                        {{-- Ada Beasiswa --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="ada_beasiswa" name="ada_beasiswa" value="1"
                                {{ old('ada_beasiswa', $informasiUmum->ada_beasiswa ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('ada_beasiswa') border-red-500 dark:border-red-500 @enderror">
                            <label for="ada_beasiswa" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah tersedia program Beasiswa?</label>
                            @error('ada_beasiswa') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Jenis Beasiswa --}}
                        <div class="mb-4">
                            <label for="jenis_beasiswa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Jenis-jenis Beasiswa</label>
                            <textarea id="jenis_beasiswa" name="jenis_beasiswa" rows="3"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('jenis_beasiswa') border-red-500 dark:border-red-500 @enderror">{{ old('jenis_beasiswa', $informasiUmum->jenis_beasiswa ?? '') }}</textarea>
                            @error('jenis_beasiswa') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Syarat Beasiswa --}}
                        <div class="mb-4">
                            <label for="syarat_beasiswa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Syarat Umum Pengajuan Beasiswa</label>
                            <textarea id="syarat_beasiswa" name="syarat_beasiswa" rows="3"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('syarat_beasiswa') border-red-500 dark:border-red-500 @enderror">{{ old('syarat_beasiswa', $informasiUmum->syarat_beasiswa ?? '') }}</textarea>
                            @error('syarat_beasiswa') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Alumni --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Informasi Alumni</h5>
                        
                        {{-- Prospek Kerja --}}
                        <div class="mb-4">
                            <label for="prospek_kerja" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Prospek Kerja Lulusan</label>
                            <textarea id="prospek_kerja" name="prospek_kerja" rows="3"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('prospek_kerja') border-red-500 dark:border-red-500 @enderror">{{ old('prospek_kerja', $informasiUmum->prospek_kerja ?? '') }}</textarea>
                            @error('prospek_kerja') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Bisa Lanjut CPNS --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="bisa_lanjut_cpns" name="bisa_lanjut_cpns" value="1"
                                {{ old('bisa_lanjut_cpns', $informasiUmum->bisa_lanjut_cpns ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('bisa_lanjut_cpns') border-red-500 dark:border-red-500 @enderror">
                            <label for="bisa_lanjut_cpns" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah lulusan bisa mengikuti CPNS?</label>
                            @error('bisa_lanjut_cpns') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Bisa Lanjut S2 --}}
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="bisa_lanjut_s2" name="bisa_lanjut_s2" value="1"
                                {{ old('bisa_lanjut_s2', $informasiUmum->bisa_lanjut_s2 ?? false) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @error('bisa_lanjut_s2') border-red-500 dark:border-red-500 @enderror">
                            <label for="bisa_lanjut_s2" class="ml-2 text-sm font-medium text-slate-700 dark:text-white">Apakah lulusan bisa melanjutkan ke S2?</label>
                            @error('bisa_lanjut_s2') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Komunitas Alumni --}}
                        <div class="mb-4">
                            <label for="komunitas_alumni" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Informasi Komunitas Alumni</label>
                            <textarea id="komunitas_alumni" name="komunitas_alumni" rows="2"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('komunitas_alumni') border-red-500 dark:border-red-500 @enderror">{{ old('komunitas_alumni', $informasiUmum->komunitas_alumni ?? '') }}</textarea>
                            @error('komunitas_alumni') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Data Tracer Study --}}
                        <div class="mb-4">
                            <label for="data_tracer_study" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Informasi Data Tracer Study</label>
                            <textarea id="data_tracer_study" name="data_tracer_study" rows="2"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('data_tracer_study') border-red-500 dark:border-red-500 @enderror">{{ old('data_tracer_study', $informasiUmum->data_tracer_study ?? '') }}</textarea>
                            @error('data_tracer_study') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Link Penting --}}
                    <div class="mb-8 p-4 border rounded-lg dark:border-slate-700">
                        <h5 class="text-lg font-semibold mb-4 text-slate-700 dark:text-white">Link Penting</h5>
                        
                        {{-- Link Kurikulum --}}
                        <div class="mb-4">
                            <label for="link_kurikulum" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Link Halaman Kurikulum</label>
                            <input type="url" id="link_kurikulum" name="link_kurikulum" 
                                value="{{ old('link_kurikulum', $informasiUmum->link_kurikulum ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_kurikulum') border-red-500 dark:border-red-500 @enderror">
                            @error('link_kurikulum') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Link Pendaftaran --}}
                        <div class="mb-4">
                            <label for="link_pendaftaran" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Link Halaman Pendaftaran</label>
                            <input type="url" id="link_pendaftaran" name="link_pendaftaran" 
                                value="{{ old('link_pendaftaran', $informasiUmum->link_pendaftaran ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_pendaftaran') border-red-500 dark:border-red-500 @enderror">
                            @error('link_pendaftaran') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        {{-- Link Pengumuman --}}
                        <div class="mb-4">
                            <label for="link_pengumuman" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Link Halaman Pengumuman</label>
                            <input type="url" id="link_pengumuman" name="link_pengumuman" 
                                value="{{ old('link_pengumuman', $informasiUmum->link_pengumuman ?? '') }}"
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_pengumuman') border-red-500 dark:border-red-500 @enderror">
                            @error('link_pengumuman') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Simpan Data Informasi Umum
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{{-- Tidak perlu lagi custom CSS di sini karena kelas Tailwind langsung diterapkan pada elemen --}}
@endpush