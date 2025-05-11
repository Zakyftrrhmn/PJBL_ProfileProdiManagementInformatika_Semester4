@extends('layouts.app')
@section('title', 'Edit Data Kurikulum')
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
                <form action="{{ route('kurikulum.update', $kurikulum) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    
                    <div class="mb-4">
                        <label for="nama_kurikulum" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Kurikulum</label>
                        <input type="text" name="nama_kurikulum" id="nama_kurikulum" value="{{ old('nama_kurikulum', $kurikulum->nama_kurikulum) }}" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:focus:ring-blue-500 @error('nama_kurikulum') border-red-500 focus:ring-red-500 dark:border-red-500 dark:focus:ring-red-500 @enderror" required>
                        @error('nama_kurikulum')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tahun_kurikulum" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tahun Berlaku</label>
                        <select name="tahun_kurikulum" id="tahun_kurikulum" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:focus:ring-blue-500 @error('tahun_kurikulum') border-red-500 focus:ring-red-500 dark:border-red-500 dark:focus:ring-red-500 @enderror" required>
                            <option value="">-- Pilih Tahun --</option>
                            @for ($year = now()->year; $year >= 2010; $year--)
                                <option value="{{ $year }}" {{ old('tahun_kurikulum', $kurikulum->tahun_kurikulum) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        @error('tahun_kurikulum')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-4">
                        <label for="file_kurikulum" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Upload File Kurikulum</label>
                        <input type="file" name="file_kurikulum" id="file_kurikulum" class="block w-full text-sm text-slate-700 border border-slate-300 rounded-lg cursor-pointer bg-white dark:bg-slate-700 dark:text-white dark:border-slate-600 dark:placeholder-slate-400 @error('file_kurikulum') border-red-500 dark:border-red-500 @enderror">
                        @if($kurikulum->file_kurikulum)
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                                File saat ini: 
                                <a href="{{ asset('storage/kurikulum/' . $kurikulum->file_kurikulum) }}" class="text-blue-500 underline" target="_blank">Lihat / Unduh</a>
                            </p>
                        @endif
                        @error('file_kurikulum')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('kurikulum.index') }}" class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Ubah Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
