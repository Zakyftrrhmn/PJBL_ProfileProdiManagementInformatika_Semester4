@extends('layouts.app')
@section('title', 'Tambah Data Profile Kelulusan')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                <form action="{{ route('admin.profile_kelulusan.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_profile" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Profile <span class="text-red-500">*</span></label>
                        <input type="text" id="nama_profile" name="nama_profile" rows="4" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:placeholder-slate-400 dark:focus:ring-blue-500 @error('nama_profile') border-red-500 focus:ring-red-500 dark:border-red-500 dark:focus:ring-red-500 @enderror" required value="{{ old('nama_profile') }}">

                        @error('nama_profile')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Capaian Pembelajaran <span class="text-red-500">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:placeholder-slate-400 dark:focus:ring-blue-500 @error('deskripsi') border-red-500 focus:ring-red-500 dark:border-red-500 dark:focus:ring-red-500 @enderror" required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="flex justify-end">
                        <a href="{{ route('admin.profile_kelulusan.index') }}" class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </a>
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
