@extends('layouts.frontside')
@section('title', 'Informasi Seputar Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
  <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
    <span class="uppercase text-[8px] md:text-xs font-semibold text-green-700 bg-green-200 px-3 py-1 rounded-full tracking-widest">
      <i class="fas fa-award mr-1"></i> {{ $frontside->prestasi_title ? $frontside->prestasi_title : 'Prestasi Mahasiswa'; }}
    </span>

    <div class="mt-4">
      <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
        {{ $frontside->prestasi_subtitle ? $frontside->prestasi_subtitle : 'Prestasi Mahasiswa'; }}
      </h2>
      <p class="text-[#838AA7] mt-2 text-sm md:text-base">
        {{ $frontside->prestasi_description ? $frontside->prestasi_description : 'Daftar prestasi mahasiswa PSDKU Pelalawan.'; }}
      </p>
    </div>

    @if ($prestasi_mahasiswa->isEmpty())
      <div class="mt-10 flex justify-center">
        <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
          Data Prestasi Mahasiswa Belum Ada
        </p>
      </div>
    @else
      <!-- Daftar Prestasi -->
      <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($prestasi_mahasiswa as $prestasi)
          <!-- Prestasi Card -->
          <div class="flex flex-col md:flex-row justify-between items-start bg-gray-100 px-4 py-4 rounded-xl shadow-sm">
            <div class="flex items-center gap-4 w-full">
              <!-- Tanggal -->
              @php
                $day = \Carbon\Carbon::parse($prestasi->tanggal_lomba)->format('D');
                $date = \Carbon\Carbon::parse($prestasi->tanggal_lomba)->format('d');
                $year = \Carbon\Carbon::parse($prestasi->tanggal_lomba)->format('Y');
              @endphp
              <div class="text-center min-w-[60px]">
                <p class="text-sm font-semibold text-gray-500">{{ $day }}</p>
                <p class="text-2xl font-bold text-gray-800">{{ $date }}</p>
                <p class="text-xs text-gray-400">{{ $year }}</p>
              </div>

              <!-- Info -->
              <div class="flex-1">
                <h3 class="text-lg font-semibold text-black">
                  <i class="fas fa-trophy text-yellow-500 mr-2"></i>{{ $prestasi->nama_lomba }}
                </h3>
                <p class="text-sm text-gray-600">
                  Tingkat: {{ $prestasi->tingkat }} • Penyelenggara: {{ $prestasi->penyelenggara }}
                </p>
                <p class="text-xs text-gray-500 mt-1">
                  Dibawakan oleh: <strong>{{ $prestasi->nama_mahasiswa }} ({{ $prestasi->nim }})</strong>
                </p>
              </div>
            </div>

            <!-- Sertifikat + Badge -->
            <div class="mt-4 md:mt-0 md:ml-auto flex flex-col items-start md:items-end gap-3">
              <span class="text-xs px-4 py-1 bg-green-200 text-green-800 rounded-full font-semibold">
                🏅 {{ $prestasi->peringkat }}
              </span>
              @if ($prestasi->file_sertifikat)
                <a href="{{ asset('storage/prestasi_mahasiswa/' . $prestasi->file_sertifikat) }}" target="_blank" class="text-sm text-blue-600 hover:underline whitespace-nowrap">
                  <i class="fas fa-file-pdf mr-1"></i>Lihat Sertifikat
                </a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </section>
@endif

@endsection