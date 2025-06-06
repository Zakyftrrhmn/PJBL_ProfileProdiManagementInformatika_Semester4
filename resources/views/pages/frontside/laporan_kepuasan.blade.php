@extends('layouts.frontside')
@section('title', 'Laporan Kepuasan Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
     
<!-- Laporan Kepuasan -->
<section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
  <span
    class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
  >
    {{ $frontside->laporan_title ? $frontside->laporan_title : 'Laporan Kepuasan'; }}
  </span>

  <!-- Judul & Tombol -->
  <div
    class="flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4"
  >
    <div>
      <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
        {{ $frontside->laporan_subtitle ? $frontside->laporan_subtitle : 'Laporan Evaluasi Kepuasan Layanan'; }}
      </h2>
      <p class="text-[#838AA7] mt-2 text-sm md:text-base">
        {{ $frontside->laporan_description ? $frontside->laporan_description : 'Evaluasi Layanan Akademik dan Non-Akademik PSDKU Pelalawan oleh Mahasiswa dan Mitra'; }}
      </p>
    </div>
  </div>

       @if ($laporan_kepuasan->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Laporan Belum di Unggah
              </p>
            </div>
        @else
  <!-- Card Grid -->
  <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Card Item -->
      <!-- Card Item (3D Style) -->
        @foreach ($laporan_kepuasan as $item)
          <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-[0_10px_25px_rgba(0,0,0,0.1)] transform transition-all duration-300 hover:-translate-y-3 hover:scale-[1.03] hover:shadow-[0_20px_40px_rgba(0,0,0,0.15)]">
            <h3 class="text-sm font-semibold text-[#1F2937] leading-relaxed">
              {{ $item->nama_laporan }}
            </h3>

            @if ($item->file_laporan)
              <a href="{{ asset('storage/laporan_kepuasan/' . $item->file_laporan) }}" download
                class="mt-4 inline-block text-center bg-[#126AFE] text-white rounded-md py-2 font-semibold text-sm hover:opacity-90 transition w-full">
                Download
              </a>
            @endif
          </div>
        @endforeach

      @endif
  </div>
</section>
@endif

@endsection