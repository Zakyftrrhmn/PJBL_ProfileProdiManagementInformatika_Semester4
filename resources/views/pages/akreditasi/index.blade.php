@extends('layouts.app') 
@section('title', 'Akreditasi')
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
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
              <form 
                    action="{{ isset($akreditasi) ? route('admin.akreditasi.update', $akreditasi->id) : route('admin.akreditasi.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($akreditasi))
                        @method('PUT')
                    @endif

                    {{-- Nama Prodi --}}
                    <div class="mb-4">
                        <label for="nama_prodi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Nama Prodi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama_prodi" name="nama_prodi" 
                            value="{{ old('nama_prodi', $akreditasi->nama_prodi ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_prodi') border-red-500 dark:border-red-500 @enderror">
                        @error('nama_prodi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Akreditasi --}}
                    <div class="mb-4">
                        <label for="akreditasi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="akreditasi" name="akreditasi" 
                            value="{{ old('akreditasi', $akreditasi->akreditasi ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('akreditasi') border-red-500 dark:border-red-500 @enderror">
                        @error('akreditasi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SK Akreditasi --}}
                    <div class="mb-4">
                        <label for="sk_akreditasi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            SK Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="sk_akreditasi" name="sk_akreditasi" 
                            value="{{ old('sk_akreditasi', $akreditasi->sk_akreditasi ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('sk_akreditasi') border-red-500 dark:border-red-500 @enderror">
                        @error('sk_akreditasi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex flex-col md:flex-row md:space-x-6">
                    {{-- Tanggal Mulai Berlaku --}}
                    <div class="flex-1">
                        <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                        Tanggal Mulai Berlaku Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', isset($akreditasi->tanggal_mulai) ? \Carbon\Carbon::parse($akreditasi->tanggal_mulai)->format('Y-m-d') : '') }}"
                        required
                        class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('tanggal_mulai') border-red-500 dark:border-red-500 @enderror">
                        @error('tanggal_mulai')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Berakhir Berlaku --}}
                    <div class="flex-1 mt-4 md:mt-0">
                        <label for="tanggal_berakhir" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                        Tanggal Berakhir Berlaku Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_berakhir" name="tanggal_berakhir"
                        value="{{ old('tanggal_berakhir', isset($akreditasi->tanggal_berakhir) ? \Carbon\Carbon::parse($akreditasi->tanggal_berakhir)->format('Y-m-d') : '') }}"
                        required
                        class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('tanggal_berakhir') border-red-500 dark:border-red-500 @enderror">
                        @error('tanggal_berakhir')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>


                    {{-- Lembaga Akreditasi --}}
                    <div class="mb-4">
                        <label for="lembaga_akreditasi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Lembaga Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="lembaga_akreditasi" name="lembaga_akreditasi" 
                            value="{{ old('lembaga_akreditasi', $akreditasi->lembaga_akreditasi ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('lembaga_akreditasi') border-red-500 dark:border-red-500 @enderror">
                        @error('lembaga_akreditasi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenjang --}}
                    <div class="mb-4">
                        <label for="jenjang" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Jenjang <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="jenjang" name="jenjang" 
                            value="{{ old('jenjang', $akreditasi->jenjang ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('jenjang') border-red-500 dark:border-red-500 @enderror">
                        @error('jenjang')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Upload Sertifikat --}}
                    <div class="mb-4">
                        <label for="photo_sertifikat" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Upload Sertifikat Akreditasi <span class="text-red-500">*</span>
                        </label>
                        <input type="file" id="photo_sertifikat" name="photo_sertifikat" accept=".jpg,.png,.jpeg"
                            class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('photo_sertifikat') border-red-500 dark:border-red-500 @enderror">
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                Format file yang diizinkan: .jpg, .jpeg, .png | Maksimal ukuran: 2MB
                            </p>

                        @if(isset($akreditasi) && $akreditasi->photo_sertifikat)
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                                Foto saat ini: <img src="{{ asset('storage/' . $akreditasi->photo_sertifikat) }}" alt="Foto Sertifikat" class="h-40 mt-2 rounded">
                            </p>
                        @endif

                        @error('photo_sertifikat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Simpan Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
