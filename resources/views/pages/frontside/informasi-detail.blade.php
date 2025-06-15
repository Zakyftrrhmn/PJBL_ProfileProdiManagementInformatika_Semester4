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
            <div class="max-w-3xl mx-auto break-words break-all text-gray-800 prose">
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

                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center space-x-1 text-sm text-[#838AA7]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                                </svg>
                                <span class="text-xs md:text-md">{{ $i->user->name ?? 'Unknown' }}</span>
                            </div>

                            <div class="text-white text-center">
                            <svg
                                class="w-5 h-5 rounded-full bg-black"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"
                                />
                            </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
