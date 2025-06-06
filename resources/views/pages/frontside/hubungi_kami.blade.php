@extends('layouts.frontside')
@section('title', 'Hubungi Pihak Prodi Manajemen Informatika PSDKU Pelalawan')
@section('content')

@if($frontside)

<section class="w-full px-6 py-16 mt-10">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 bg-white shadow-2xl rounded-3xl overflow-hidden">

    <!-- Left: Contact Info -->
    <div class="bg-[#202020] text-white p-10 space-y-8 flex flex-col justify-between">
      <div>
        <h2 class="text-2xl font-bold mb-2">
          {{ $frontside->kontak_title ?? 'Informasi Kontak' }}
        </h2>
        <p class="text-sm text-slate-300">
          {{ $frontside->kontak_description ?? 'Hubungi kami untuk pertanyaan, saran, atau kritik.' }}
        </p>
      </div>

      <div class="space-y-6 text-sm">
        <div class="flex items-center space-x-4">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.93 15.93 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.72 11.72 0 003.66.59 1 1 0 011 1v3.67a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.67a1 1 0 011 1 11.72 11.72 0 00.59 3.66 1 1 0 01-.21 1.11l-2.43 2.43z"/></svg>
          <span>{{ $kontak_kami?->no_telp ?? 'No telp belum tersedia' }}</span>
        </div>
        <div class="flex items-center space-x-4">
          <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M21 8V7l-3 2-2-1-6 5-2-2-5 4V20h20V8z"/></svg>
          <span>{{ $kontak_kami?->gmail ?? 'Gmail belum tersedia' }}</span>
        </div>
        <div class="flex items-center space-x-4">
          <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
          <span>{{ $kontak_kami?->location ?? 'Lokasi belum tersedia' }}</span>
        </div>
      </div>

      <div class="flex space-x-2  items-center mt-4">
        <a href="{{ $kontak_kami?->link_website ?? '#' }}" target="_blank"
           class="bg-white text-[#002037] w-10 h-10 flex items-center justify-center rounded-full hover:bg-slate-100 transition">
           <i class="fas fa-globe text-xl"></i>
        </a>
        <a href="{{ $kontak_kami?->link_instagram ?? '#' }}" target="_blank"
           class="bg-white text-[#002037] w-10 h-10 flex items-center justify-center rounded-full hover:bg-slate-100 transition">
           <i class="fab fa-instagram text-xl"></i>
        </a>
        <a href="{{ $kontak_kami?->link_fb ?? '#' }}" target="_blank"
           class="bg-white text-[#002037] w-10 h-10 flex items-center justify-center rounded-full hover:bg-slate-100 transition">
           <i class="fab fa-facebook text-xl"></i>
        </a>
      </div>
    </div>

<!-- Contact Form -->
<div class="p-10 space-y-6">

  @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form class="space-y-6" action="{{ route('hubungi_kami_proses') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="nama" class="block text-sm font-semibold mb-1">Nama</label>
      <input
        name="nama"
        id="nama"
        type="text"
        placeholder="Masukkan Nama Anda"
        class="w-full border-b border-gray-300 focus:outline-none py-2 @error('nama') border-red-500 @enderror"
        value="{{ old('nama') }}"
      />
      @error('nama')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="email" class="block text-sm font-semibold mb-1">Email</label>
      <input
        name="email"
        id="email"
        type="email"
        placeholder="Masukkan Email Anda"
        class="w-full border-b border-gray-300 focus:outline-none py-2 @error('email') border-red-500 @enderror"
        value="{{ old('email') }}"
      />
      @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="pesan" class="block text-sm font-semibold mb-1">Pesan</label>
      <textarea
        name="pesan"
        id="pesan"
        rows="4"
        placeholder="Tulis Pesan Anda ..."
        class="w-full border-b border-gray-300 focus:outline-none py-2 @error('pesan') border-red-500 @enderror"
      >{{ old('pesan') }}</textarea>
      @error('pesan')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <button type="submit" class="bg-[#202020] text-white py-3 px-6 rounded-md hover:bg-[#001529] transition">
        Kirim Pesan
      </button>
    </div>
  </form>
</div>

  </div>
</section>

@endif

@endsection
