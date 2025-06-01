@extends('layouts.app')
@section('title', 'Detail Data Dosen')
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
                {{-- Username --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Username</label>
                    <input type="text" readonly value="{{ $dosen->username }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Dosen</label>
                    <input type="text" readonly value="{{ $dosen->nama }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Asal Kota --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Asal Kota</label>
                    <input type="text" readonly value="{{ $dosen->asal_kota }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- NIDN --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">NIDN</label>
                    <input type="text" readonly value="{{ $dosen->nidn }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Email</label>
                    <input type="email" readonly value="{{ $dosen->email }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Website --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Website</label>
                    <input type="url" readonly value="{{ $dosen->website }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Pendidikan --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Pendidikan Terakhir</label>
                    <input type="text" readonly value="{{ $dosen->pendidikan }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Jabatan --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Jabatan Akademik</label>
                    <input type="text" readonly value="{{ $dosen->jabatan }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Foto --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Foto</label>
                    @if ($dosen->photo)
                        <img src="{{ asset('storage/dosen/' . $dosen->photo) }}" alt="Foto Dosen"
                             class="w-32 h-32 object-cover rounded-lg border border-slate-300 dark:border-slate-600">
                    @else
                        <p class="text-sm text-slate-500 dark:text-slate-300">Belum ada foto.</p>
                    @endif
                </div>

                {{-- Tombol Kembali --}}
                <div class="flex justify-end">
                    <a href="{{ route('admin.dosen.index') }}"
                       class="text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
