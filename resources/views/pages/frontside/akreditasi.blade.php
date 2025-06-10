@extends('layouts.frontside')
@section('title', 'Akreditasi Manajemen Informatika PSDKU Pelalawan')
@section('content')
  
@if($frontside)
    <section class="w-full px-5 md:px-20 py-16 my-10 bg-white">
      <span class="uppercase text-[8px] md:text-xs font-semibold text-green-700 bg-green-200 px-3 py-1 rounded-full tracking-widest">
        {{ $frontside->akreditasi_title ? $frontside->akreditasi_title : 'Akreditasi'; }}
      </span>

      <!-- Judul -->
      <div class="w-full flex flex-col md:flex-row md:justify-between md:items-center mt-4 gap-4">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
            {{ $frontside->akreditasi_subtitle ? $frontside->akreditasi_subtitle : 'Akreditasi'; }}
          </h2>
          <p class="text-[#838AA7] mt-2 text-sm md:text-base">
            {{ $frontside->akreditasi_description ? $frontside->akreditasi_description : 'Akreditasi Program Studi Manajemen Informatika PSDKU Pelalawan.'; }}
          </p>
        </div>
      </div>
       @if($akreditasi == null)
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Akreditasi Belum di Unggah
              </p>
            </div>
        @else
        <!-- Konten Gambar dan Tabel -->
        <div class="mt-10 flex flex-col lg:flex-row gap-8 items-start">
            <!-- Gambar Sertifikat -->
            <div class="w-full lg:w-1/2">
            <img src="{{ asset('storage/' . $akreditasi->photo_sertifikat) }}" alt="Sertifikat Akreditasi" class="rounded-xl shadow-2xl w-full object-contain">
            </div>

            <!-- Tabel Data Akreditasi -->
<div class="w-full lg:w-1/2">
    <div class="bg-[#1E1E1E] rounded-xl shadow-xl overflow-hidden">
        <table class="w-full text-sm text-white">
            <tbody>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300 w-1/3">Nama Prodi</td>
                    <td class="px-6 py-4">:{{ $akreditasi->nama_prodi }}</td>
                </tr>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300">Akreditasi</td>
                    <td class="px-6 py-4">:{{ $akreditasi->akreditasi }}</td>
                </tr>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300 ">SK Akreditasi</td>
                    <td class="px-6 py-4">:{{ $akreditasi->sk_akreditasi }}</td>
                </tr>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300">Tanggal Berlaku</td>
                    <td class="px-6 py-4">:
                        {{ \Carbon\Carbon::parse($akreditasi->tanggal_mulai)->translatedFormat('d F Y') }} –
                        {{ \Carbon\Carbon::parse($akreditasi->tanggal_berakhir)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300 md:text-nowrap">Lembaga Akreditasi</td>
                    <td class="px-6 py-4">:{{ $akreditasi->lembaga_akreditasi }}</td>
                </tr>
                <tr class="even:bg-[#2a2a2a] hover:bg-[#333333] transition">
                    <td class="px-6 py-4 font-medium text-gray-300">Jenjang</td>
                    <td class="px-6 py-4">:{{ $akreditasi->jenjang }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        </div>
        @endif
      
    </section>
@endif

@endsection