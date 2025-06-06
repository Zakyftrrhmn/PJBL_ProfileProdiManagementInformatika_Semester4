@extends('layouts.frontside')
@section('title', 'Informasi Seputar Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
    <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
      <span
        class="uppercase text-[8px]  md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
      >
        {{ $frontside->information_title ? $frontside->information_title : 'ARTIKEL & BERITA'; }}
      </span>

      <!-- Judul & Tombol Responsive -->
      <div
        class="flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4"
      >
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
            {{ $frontside->information_subtitle ? $frontside->information_subtitle : 'Berita & Artikel Terkini'; }}
          </h2>
          <p class="text-[#838AA7] mt-2 text-sm md:text-base">
            {{ $frontside->information_description ? $frontside->information_description : 'Update terbaru seputar kegiatan, prestasi, dan informasi penting dari Manajemen Informatika psdku pelalawan.'; }}
          </p>
        </div>
      </div>

      @if ($informasi->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Informasi Belum Ada
              </p>
            </div>
        @else
            <div
                class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
            >
            
            @foreach ($informasi as $i)
                <a href="{{ route('informasi.detail', $i->slug) }}" class="block bg-white rounded-2xl overflow-hidden shadow-md transition hover:shadow-lg">
                    <!-- Gambar -->
                    <img
                        src="{{ $i->thumbnail ? asset('storage/' . $i->thumbnail) : asset('assets/frontside/img/naruto.jpg') }}"
                        alt="Artikel"
                        class="w-full h-48 object-cover rounded-t-2xl"
                    />
                    <!-- Konten -->
                    <div class="p-4 bg-white relative">
                        <h3 class="text-base font-semibold text-black mb-2 leading-snug line-clamp-2">
                            {{ $i->judul }}
                        </h3>
                        <div class="text-xs text-[#838AA7] mb-3">
                            {{ $i->created_at->diffForHumans() }} <span class="mx-1">•</span>
                            <span class="underline text-green-500">{{ $i->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2 text-sm text-[#838AA7]">
                                <img
                                    src="{{ asset('assets/frontside/img/naruto.jpg') }}"
                                    class="w-5 h-5 rounded-full object-cover"
                                    alt="admin"
                                />
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
        @endif
    </section>
@endif

@endsection