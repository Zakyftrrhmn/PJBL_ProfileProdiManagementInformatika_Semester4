@extends('layouts.frontside')
@section('title', 'Kalender Akademik Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
    <!-- Kalender Akademik -->
    <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
      <span class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest">
        {{ $frontside->kalender_title ? $frontside->kalender_title : 'Kalender Akademik'; }}
      </span>
      @if($kalender_akademik == null)
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Kalender Akademik Belum di Unggah
              </p>
            </div>
        @else
      <!-- Judul -->
      <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
            {{ $kalender_akademik->judul ? $kalender_akademik->judul : 'Kalender Akademik Politeknik Negeri Padang Tahun'; }}
          </h2>
        </div>
      </div>

      <!-- Gambar Kalender -->
      <div class="mt-10 flex justify-center">
        <img 
          src="{{ asset('storage/' . $kalender_akademik->photo_kalender) }}" 
          alt="Kalender Akademik PNP 2024/2025" 
          class="w-full max-w-7xl rounded-lg shadow-md object-contain"
        />
      </div>
      @endif
    </section>
@endif

@endsection