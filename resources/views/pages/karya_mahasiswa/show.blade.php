@extends('layouts.app')
@section('title', 'Data Karya Mahasiswa')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col mb-6 bg-white shadow-xl dark:bg-slate-850 rounded-2xl overflow-hidden">

            <div class="flex justify-between">
                <div class="p-6 pb-0">
                    <h6 class="dark:text-white">Detail @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">

                {{-- Judul --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Judul</label>
                    <input type="text" readonly value="{{ $karya_mahasiswa->judul }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kategori</label>
                    <input type="text" readonly value="{{ $karya_mahasiswa->kategori_karya->nama_kategori }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Tahun --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tahun</label>
                    <input type="text" readonly value="{{ $karya_mahasiswa->tahun }}"
                           class="block w-full px-4 py-2 text-sm bg-gray-100 border border-slate-300 rounded-lg shadow-sm cursor-not-allowed dark:bg-slate-700 dark:text-white dark:border-slate-600">
                </div>

                {{-- Isi --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Isi</label>
                    <div class="prose dark:prose-invert max-w-none bg-gray-100 p-4 rounded-lg border border-slate-300 dark:bg-slate-700 dark:border-slate-600">
                        {!! $karya_mahasiswa->isi !!}
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Thumbnail</label>
                    @if ($karya_mahasiswa->thumbnail)
                        <img src="{{ asset('storage/' . $karya_mahasiswa->thumbnail) }}" alt="Thumbnail"
                             class="w-32 h-32 object-cover rounded-lg border border-slate-300 dark:border-slate-600">
                    @else
                        <p class="text-sm text-slate-500 dark:text-slate-300">Belum ada thumbnail.</p>
                    @endif
                </div> 
                {{-- Tombol Kembali --}}
                <div class="flex justify-end">
                    <a href="{{ route('admin.karya_mahasiswa.index') }}"
                       class="text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
