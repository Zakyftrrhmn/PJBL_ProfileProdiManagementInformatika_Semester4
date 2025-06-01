@extends('layouts.app')
@section('title', 'Data Informasi')
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

                {{-- Judul --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Judul</label>
                    <input type="text" readonly value="{{ $informasi->judul }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kategori</label>
                    <input type="text" readonly value="{{ $informasi->kategori->nama_kategori }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Isi Informasi --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Isi Informasi</label>
                    <div class="prose dark:prose-invert max-w-none bg-gray-100 p-4 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600">
                        {!! $informasi->isi !!}
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Thumbnail</label>
                    @if ($informasi->thumbnail)
                        <img src="{{ asset('storage/' . $informasi->thumbnail) }}" alt="Thumbnail"
                             class="w-32 h-32 object-cover rounded-lg border border-slate-300 dark:border-slate-600">
                    @else
                        <p class="text-sm text-slate-500 dark:text-slate-300">Belum ada thumbnail.</p>
                    @endif
                </div>

                {{-- Dibuat Oleh --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Dibuat oleh</label>
                    <input type="text" readonly value="{{ $informasi->user->name ?? 'Tidak diketahui' }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Tanggal Dibuat --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tanggal Dibuat</label>
                    <input type="text" readonly value="{{ $informasi->created_at->translatedFormat('d F Y H:i') }}"
                        class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>


                {{-- Tombol Kembali --}}
                <div class="flex justify-end">
                    <a href="{{ route('admin.informasi.index') }}"
                       class="text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
