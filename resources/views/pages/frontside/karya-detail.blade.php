@extends('layouts.frontside')
@section('title', $karya_mahasiswa->judul)
@section('content')

<section class="w-full px-5 md:px-20 py-20 my-10 bg-white">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="md:w-2/3">
            <!-- Judul -->
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                {{ $karya_mahasiswa->judul }}
            </h1>

            <!-- Tahun Karya -->
            <div class="text-sm text-gray-600 flex items-center gap-2 mb-4">
                <span class="flex items-center gap-1">
                    <i class="fas fa-clock"></i> Project dibuat pada Tahun: {{ $karya_mahasiswa->tahun }} - <span class="text-green-800 bg-green-300 px-2 py-1 text-xs font-semibold uppercase rounded-full">{{ $karya_mahasiswa->kategori_karya->nama_kategori ?? 'Tanpa Kategori' }}</span>
                </span>
            </div>

            <!-- Gambar -->
            <div class="rounded-xl overflow-hidden mb-6 shadow-lg">
                <img src="{{ $karya_mahasiswa->thumbnail ? asset('storage/' . $karya_mahasiswa->thumbnail) : asset('assets/frontside/img/karya.png') }}"
                    class="w-full h-80 object-cover rounded-xl"
                    alt="{{ $karya_mahasiswa->judul }}">
            </div>

            <!-- Isi -->
            <div class="max-w-3xl mx-auto break-words break-all text-gray-800">
                {!! $karya_mahasiswa->isi !!}
            </div>
        </div>

        <!-- Sidebar: Karya Lainnya -->
        <div class="md:w-1/3 space-y-6 border border-gray-300 px-6 py-6 rounded-lg h-full">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Karya Lainnya</h2>
            @foreach ($karyaTerbaru as $km)
                <a href="{{ route('karya_mahasiswa.detail', $km->slug) }}"
                   class="block bg-white rounded-2xl overflow-hidden shadow-md transition hover:shadow-lg">
                    <!-- Gambar -->
                    <img
                        src="{{ $km->thumbnail ? asset('storage/' . $km->thumbnail) : asset('assets/frontside/img/karya.png') }}"
                        alt="{{ $km->judul }}"
                        class="w-full h-40 object-cover rounded-t-2xl"
                    />
                    <!-- Konten -->
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-black mb-1 leading-snug line-clamp-2">
                            {{ $km->judul }}
                        </h3>
                        <div class="text-xs text-[#838AA7]">
                            {{ $km->created_at->diffForHumans() }} <span class="mx-1">•</span>
                            <span class="underline text-green-500">
                                {{ $km->kategori_karya->nama_kategori ?? 'Tanpa Kategori' }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
