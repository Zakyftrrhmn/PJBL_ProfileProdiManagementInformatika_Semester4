@extends('layouts.frontside')
@section('title', 'Karya Mahasiswa Manajemen Informatika PSDKU Pelalawan')
@section('content')

@if($frontside)
  <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
          <span class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest">
            {{ $frontside->karya_title ?? 'KARYA ANAK MANAJEMEN INFORMATIKA PSDKU PELALAWAN' }}
          </span>

          <h2 class="text-3xl md:text-4xl font-bold font-['Rubik'] text-gray-900 mt-2">
            {{ $frontside->karya_subtitle ?? 'Karya Nyata, Bukan Cuma Tugas Kuliah!' }}
          </h2>

          <p class="text-[#838AA7] mt-1 text-base">
            {{ $frontside->karya_description ?? 'Lihat hasil seru dari ide-ide mahasiswa: IoT, Web, dan Mobile siap tampil!' }}
          </p>

      <!-- Cek apakah ada data karya mahasiswa -->
      @if ($karya_mahasiswa->isEmpty())
        <div class="mt-10 flex justify-center">
          <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
            Data Karya Mahasiswa Belum Ada
          </p>
        </div>
      @else
        <!-- Grid Container -->
        <div class="mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($karya_mahasiswa as $karya)
            <a href="{{ route('karya_mahasiswa.detail', $karya->slug) }}" class="block">
                <div class="bg-white rounded-[10px] overflow-hidden shadow-sm mx-auto w-full">
                    <img
                        src="{{ asset('storage/' . $karya->thumbnail) }}"
                        alt="{{ $karya->judul }}"
                        class="w-full h-48 object-cover rounded-t-[10px]"
                    />
                    <div class="p-4">
                        <p class="font-['Inter'] text-[16px] md:text-[18px] text-gray-900 leading-snug text-start line-clamp-2">
                            {{ $karya->judul }}
                        </p>
                        <p class="font-['Inter'] text-[12px] md:text-[14px] tracking-[0.1em] text-green-600 mt-1 uppercase text-start">
                            {{ $karya->kategori_karya->nama_kategori }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach

        </div>
      @endif
  </section>
@endif

@endsection
