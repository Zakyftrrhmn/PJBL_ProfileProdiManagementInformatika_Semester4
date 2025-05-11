@extends('layouts.app')
@section('title', 'Detail Pesan Masuk')
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
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Pengirim</label>
                    <p class="text-slate-800 dark:text-white">{{ $hubungiKami->nama }}</p>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Email</label>
                    <p class="text-slate-800 dark:text-white">{{ $hubungiKami->email }}</p>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Subjek</label>
                    <p class="text-slate-800 dark:text-white">{{ $hubungiKami->subjek }}</p>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Pesan</label>
                    <div class="p-4 border border-slate-300 rounded-md bg-slate-50 dark:bg-slate-700 dark:text-white dark:border-slate-600">
                        {!! nl2br(e($hubungiKami->pesan)) !!}
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('hubungi_kami.index') }}" class="text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
