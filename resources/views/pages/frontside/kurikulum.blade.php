@extends('layouts.frontside')
@section('title', 'Kurikulum Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
<section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
  <span class="uppercase text-[8px] md:text-xs font-semibold text-green-700 bg-green-200 px-3 py-1 rounded-full tracking-widest">
    {{ $frontside->kurikulum_title ? $frontside->kurikulum_title : 'Kurikulum'; }}
  </span>

  <div class="w-full flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4">
    <div>
      <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
        {{ $frontside->kurikulum_subtitle ? $frontside->kurikulum_subtitle : 'Struktur Kurikulum Program Studi'; }}
      </h2>
      <p class="text-[#838AA7] mt-2 text-sm md:text-base">
        {{ $frontside->kurikulum_description ? $frontside->kurikulum_description : 'Daftar mata kuliah beserta rencana pembelajaran pada Program Studi Manajemen Informatika PSDKU Pelalawan.'; }}
      </p>
    </div>
  </div>
         @if ($perSemester->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Kurikulum Belum di Unggah
              </p>
            </div>
        @else
          <div class="w-full space-y-10 mt-10">
            @foreach ($perSemester as $semester => $matkuls)
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-black py-3 px-5">
                  {{ $semester }}
                </h3>
                <div class="w-full overflow-x-auto">
                  <table class="min-w-[900px] w-full text-sm text-left text-white bg-[#202020] rounded-xl shadow-2xl overflow-hidden">
                    <thead class="bg-[#202020] text-white">
                      <tr>
                        <th class="px-4 py-3 text-center">No</th>
                        <th class="px-4 py-3">Kode MK</th>
                        <th class="px-4 py-3">Nama Mata Kuliah</th>
                        <th class="px-4 py-3">Bentuk Perkuliahan</th>
                        <th class="px-4 py-3 text-center">SKS</th>
                        <th class="px-4 py-3 text-center">RPS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($matkuls as $i => $matkul)
                        <tr class="bg-white text-black border border-gray-700">
                          <td class="px-4 py-3 text-center">{{ $i + 1 }}</td>
                          <td class="px-4 py-3">{{ $matkul->kode_mk }}</td>
                          <td class="px-4 py-3">{{ $matkul->mata_kuliah }}</td>
                          <td class="px-4 py-3">{{ $matkul->bentuk_perkuliahan }}</td>
                          <td class="px-4 py-3 text-center">{{ $matkul->sks }}</td>
                          <td class="px-4 py-3 text-center">
                                      @if ($matkul->rps)
                                      <a href="{{ asset('storage/kurikulum/' . $matkul->rps) }}" download
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 text-xs">
                                        Lihat File
                                      </a>
                                      @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            @endforeach
          </div>
        @endif
</section>
@endif

@endsection