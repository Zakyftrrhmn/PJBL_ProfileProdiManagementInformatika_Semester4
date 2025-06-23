@extends('layouts.frontside') {{-- Asumsi Anda memiliki layout 'frontside' --}}
@section('title', 'Chat dengan MIPel Bot') {{-- Judul halaman untuk tab browser --}}

@section('content')

<section class="w-full px-5 md:px-10 lg:px-20 py-16 my-10 bg-gradient-to-br from-white to-blue-50">
    {{-- Tag untuk identifikasi --}}
    <span class="inline-flex items-center px-4 py-1.5 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full tracking-wide shadow-sm">
        <svg class="w-3 h-3 mr-1.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.336-3.11c-.813-1.047-1.336-2.319-1.336-3.89C2 6.134 5.582 3 10 3s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9H7v2h2V9z" clip-rule="evenodd"></path>
        </svg>
        AI ASSISTANT
    </span>

    {{-- Judul dan Deskripsi Bot --}}
    <div class="mt-6">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 font-['Rubik'] leading-tight">
            Chat dengan <span class="text-blue-600">MIPel Bot</span>
        </h2>
        <p class="text-gray-600 mt-4 text-base md:text-lg max-w-2xl">
            Halo! Saya MIPel Bot, asisten AI Anda di Kampus Manajemen Informatika PSDKU Pelalawan. Tanyakan apa saja tentang kurikulum, dosen, atau informasi umum lainnya!
        </p>
    </div>

    {{-- Container utama chatbot dengan border, radius, dan shadow --}}
    {{-- Class 'rounded-xl', 'border', 'border-gray-200', dan 'shadow-lg' ditambahkan kembali --}}
    <div class="w-full max-w-2xl lg:max-w-3xl overflow-hidden flex flex-col h-[70vh] mx-auto mt-16
                bg-white border border-gray-200 rounded-xl shadow-lg"> {{-- <--- PERUBAHAN DI SINI --}}

        {{-- Header atau Branding di dalam container chatbot --}}
        {{-- Kita akan membuat header ini menjadi bagian atas yang ber-border bawah --}}
        <div class="flex items-center justify-between p-4 bg-blackborder-b bg-black rounded-t-xl"> {{-- <--- PERUBAHAN DI SINI --}}
<h3 class="flex items-center text-lg font-semibold text-white">
    <img src="{{ asset('assets/frontside/img/chatbot-white.png') }}" class="w-8 h-8 mr-2" alt="Chatbot Icon">
    MIPel Bot Chat
</h3>

            <span class="text-sm text-green-800 font-medium px-2 py-1 rounded-full bg-green-300">Online</span> {{-- Contoh status online --}}
        </div>

        {{-- Ini adalah tempat komponen Livewire chatbot akan dirender --}}
        @livewire('ai-chat-simple')
    </div>

</section>

@endsection