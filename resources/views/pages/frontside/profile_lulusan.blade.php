@extends('layouts.frontside')
@section('title', 'Profile Lulusan Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
    <!-- Kalender Akademik -->
    <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
      <span class="uppercase text-[8px] md:text-xs font-semibold text-green-700 bg-green-200 px-3 py-1 rounded-full tracking-widest">
        {{ $frontside->profile_title ? $frontside->profile_title : 'Profile Lulusan'; }}
      </span>

      <!-- Judul -->
      <div class="w-full flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
            {{ $frontside->profile_subtitle ? $frontside->profile_subtitle : 'Profile Lulusan'; }}
          </h2>
          <p class="text-[#838AA7] mt-2 text-sm md:text-base">
            {{ $frontside->profile_description ? $frontside->profile_description : 'Berbagai peran yang dapat dilakukan oleh lulusan program studi Informatika di bidang keahlian atau bidang kerja tertentu setelah menyelesaikan masa perkuliahan.'; }}
          </p>
        </div>
      </div>
      <div class="mt-10 flex flex-col lg:flex-row gap-8 items-start">

        <!-- Tabel Data Akreditasi -->
      <div class="w-full overflow-x-auto">
        <table class="min-w-full text-sm text-left text-black bg-white rounded-t-xl shadow-2xl overflow-hidden ">
          <thead class="bg-[#202020] text-white">
            <tr>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">No</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">Profil</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">Capaian Pembelajaran</th>
            </tr>
          </thead>
          @foreach ($profile as $item)
            <tr class="border-b">
              <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_profile }}</td>
              <td class="px-6 py-4">
                {{ $item->deskripsi }}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>


      </div>
    </section>
@endif

@endsection