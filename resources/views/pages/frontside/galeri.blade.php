@extends('layouts.frontside')
@section('title', 'Dokumentasi Photo Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
  <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
    <span class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest">
      {{ $frontside->galeri_title ? $frontside->galeri_title : 'GALERI'; }}
    </span>

    <div class="mt-4">
      <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
        {{ $frontside->galeri_subtitle ? $frontside->galeri_subtitle : 'Galeri Kegiatan & Dokumentasi'; }}
      </h2>
      <p class="text-[#838AA7] mt-2 text-sm md:text-base max-w-xl">
        {{ $frontside->galeri_description ? $frontside->galeri_description : 'Lihat momen-momen penting dan kegiatan menarik kami.'; }}
      </p>
    </div>

    <!-- Masonry Gallery -->
    @if ($galeri->isEmpty())
      <div class="mt-10 flex justify-center">
        <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
          Galeri Belum Ada
        </p>
      </div>
    @else
    <div class="columns-1 sm:columns-2 md:columns-3 gap-4 mt-10 space-y-4">
      @foreach ($galeri as $g)
        <img src="{{ asset('storage/gallery/' . $g->photo) }}" alt="1" class="w-full rounded-lg mb-4 break-inside-avoid" />
      @endforeach
      <!-- Tambah gambar lagi sesuai kebutuhan -->
    </div>
    @endif
  </section>
@endif

@endsection