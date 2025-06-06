@extends('layouts.frontside')
@section('title', $informasi->judul)
@section('content')

<section class="w-full px-5 md:px-20 py-20 my-10 bg-white">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="md:w-2/3">
            <!-- Metadata -->
                       <!-- Judul -->
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                {{ $informasi->judul }}
            </h1>
            
            <div class="text-sm text-gray-600 flex items-center gap-2 mb-4">
                <span class="flex items-center gap-1"><i class="fas fa-globe"></i> Dibuat pada : {{ $informasi->created_at->format('F d, Y') }}</span>
                <span>•</span>
                <span class="text-green-800 bg-green-300 px-2 py-1 font-semibold uppercase rounded-full ">{{ $informasi->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
            </div>

            <div class="text-sm text-gray-600 flex items-center gap-2 mb-4">
                <span class="flex items-center gap-1"><i class="fas fa-user"></i> Dipublish oleh : {{ $informasi->user->name }}</span>
            </div>

 

            <!-- Gambar -->
            <div class="rounded-xl overflow-hidden mb-6 shadow-lg">
                <img src="{{ $informasi->thumbnail ? asset('storage/' . $informasi->thumbnail) : asset('assets/frontside/img/naruto.jpg') }}"
                    class="w-full h-80 object-cover rounded-xl"
                    alt="{{ $informasi->judul }}">
            </div>

            <!-- Isi -->
            <div class="max-w-3xl mx-auto break-words break-all text-gray-800">
                {!! $informasi->isi !!}
            </div>

        </div>

        <!-- Sidebar: Berita Terbaru -->
        <div class="md:w-1/3 space-y-6 border border-gray-300 px-6 py-6 rounded-lg h-full">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Berita Terbaru</h2>
            @foreach ($beritaTerbaru as $i)
                <a href="{{ route('informasi.detail', $i->slug) }}"
                   class="block bg-white rounded-2xl overflow-hidden shadow-md transition hover:shadow-lg">
                    <!-- Gambar -->
                    <img
                        src="{{ $i->thumbnail ? asset('storage/' . $i->thumbnail) : asset('assets/frontside/img/naruto.jpg') }}"
                        alt="{{ $i->judul }}"
                        class="w-full h-40 object-cover rounded-t-2xl"
                    />
                    <!-- Konten -->
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-black mb-1 leading-snug line-clamp-2">
                            {{ $i->judul }}
                        </h3>
                        <div class="text-xs text-[#838AA7]">
                            {{ $i->created_at->diffForHumans() }} <span class="mx-1">•</span>
                            <span class="underline text-green-500">{{ $i->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
