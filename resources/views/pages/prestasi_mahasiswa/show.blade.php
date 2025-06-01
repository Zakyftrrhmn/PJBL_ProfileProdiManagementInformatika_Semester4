@extends('layouts.app')
@section('title', 'Data Prestasi Mahasiswa')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Detail @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                {{-- Nama Mahasiswa --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Mahasiswa</label>
                    <input type="text" readonly value="{{ $prestasi->nama_mahasiswa }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- NIM --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">NIM</label>
                    <input type="text" readonly value="{{ $prestasi->nim }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Nama Prestasi --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Prestasi</label>
                    <input type="text" readonly value="{{ $prestasi->nama_lomba }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Tingkat --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tingkat</label>
                    <input type="text" readonly value="{{ $prestasi->tingkat }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Tanggal Prestasi --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tanggal Prestasi</label>
                    <input type="date" readonly value="{{ $prestasi->tanggal_lomba }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- File Sertifikat --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">File Sertifikat</label>
                    @if ($prestasi->file_sertifikat)
                    <a href="{{ asset('storage/prestasi_mahasiswa/' . $prestasi->file_sertifikat) }}" target="_blank" class="text-blue-600 underline dark:text-blue-400">Lihat / Unduh Sertifikat</a>
                    @endif
                </div>

                {{-- Tombol Kembali --}}
                <div class="flex justify-end">
                    <a href="{{ route('admin.prestasi_mahasiswa.index') }}"
                        class="text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
