@extends('layouts.app')
@section('title', 'Tambah Laporan Kepuasan')
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
                <form action="{{ route('admin.laporan_kepuasan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_laporan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Laporan <span class="text-red-500">*</span></label>
                        <input type="text" id="nama_laporan" name="nama_laporan" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_laporan') border-red-500 dark:border-red-500 @enderror" value="{{ old('nama_laporan') }}" required>
                        @error('nama_laporan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="file_laporan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Upload File Laporan Kepuasan <span class="text-red-500">*</span></label>
                        <input type="file" id="file_laporan" name="file_laporan" accept=".pdf,.doc,.docx" class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('file_laporan') border-red-500 dark:border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Format file yang diizinkan: .pdf, .doc, .docx</p>
                        @error('file_laporan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('admin.laporan_kepuasan.index') }}" class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
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
