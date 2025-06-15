@extends('layouts.app')
@section('title', 'Tambah Data Dosen')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Nama --}}
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Dosen <span class="text-red-500">*</span></label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- Username --}}
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Username <span class="text-red-500">*</span></label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('username') border-red-500 @enderror">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                   
                    {{-- Asal Kota --}}
                    <div class="mb-4">
                        <label for="asal_kota" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Asal Kota <span class="text-red-500">*</span></label>
                        <input type="text" id="asal_kota" name="asal_kota" value="{{ old('asal_kota') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('asal_kota') border-red-500 @enderror">
                        @error('asal_kota')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NIDN --}}
                    <div class="mb-4">
                        <label for="nidn" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">NIDN <span class="text-red-500">*</span></label>
                        <input type="number" id="nidn" name="nidn" value="{{ old('nidn') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nidn') border-red-500 @enderror">
                        @error('nidn')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Website --}}
                    <div class="mb-4">
                        <label for="website" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Website <span class="text-red-500">*</span></label>
                        <input type="text" id="website" name="website" placeholder="https://example.com" value="{{ old('website') }}"
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('website') border-red-500 @enderror">
                        @error('website')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Pendidikan --}}
                    <div class="mb-4">
                        <label for="pendidikan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Pendidikan Terakhir <span class="text-red-500">*</span></label>
                        <input type="text" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('pendidikan') border-red-500 @enderror">
                        @error('pendidikan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-4">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Jabatan Akademik <span class="text-red-500">*</span></label>
                        <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required
                               class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('jabatan') border-red-500 @enderror">
                        @error('jabatan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="mb-4">
                        <label for="photo" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Upload Foto <span class="text-red-500">*</span></label>
                        <input type="file" id="photo" name="photo" accept="image/*"
                               class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('photo') border-red-500 dark:border-red-500 @enderror">
                               <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                Format file yang diizinkan: .jpg, .jpeg, .png | Maksimal ukuran: 2MB
                                </p>

                        @error('photo')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end">
                        <a href="{{ route('admin.dosen.index') }}"
                           class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </a>
                        <button type="submit"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Simpan Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
