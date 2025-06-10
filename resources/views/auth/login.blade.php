@extends('layouts.auth')
@section('title', 'Halaman Login | Prodi Manajemen Informatika')

@section('content')

  <div class="flex flex-col md:flex-row w-full max-w-5xl mx-auto rounded-3xl overflow-hidden shadow-lg bg-white">
    
    <!-- Left Section -->
    <div class="w-full md:w-1/2 bg-white p-10 flex flex-col justify-center">
      <div class="mb-6">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo MI" class="w-12 h-12 rounded-full mb-4" /> 
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2 font-[Rubik] uppercase">Selamat Datang</h1>
        <p class="text-gray-500 text-sm font-inter">Login untuk mengakses sistem Prodi Manajemen Informatika PSDKU Pelalawan.</p>
      </div>

      <!-- Session Flash -->
      @if(session('success'))
        <div class="bg-green-500 text-white text-sm rounded py-2 px-4 mb-4 text-center shadow">
          {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="bg-red-500 text-white text-sm rounded py-2 px-4 mb-4 text-center shadow">
          {{ session('error') }}
        </div>
      @endif

      <form class="space-y-5 mt-6" method="POST" action="{{ route('login.proses') }}">
        @csrf
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 font-inter">Email</label>
          <input type="email" id="email" name="email" placeholder="you@example.com"
                 class="mt-1 block w-full px-4 py-2 border rounded-xl shadow-sm outline-none focus:ring-purple-500 focus:border-purple-500 @error('email') border-red-500 @enderror" required />
          @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 font-inter" >Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••"
                 class="mt-1 block w-full px-4 py-2 border rounded-xl shadow-sm outline-none focus:ring-purple-500 focus:border-purple-500 @error('password') border-red-500 @enderror" required />
          @error('password')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Login Button -->
        <button type="submit"
                class="w-full py-2 px-4 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-xl transition duration-300">
          Login
        </button>

        <p class="text-sm text-center text-gray-400 mt-4">© 2025 MI PSDKU Pelalawan</p>
      </form>
    </div>

    <!-- Right Section -->
    <div class="hidden md:block w-full md:w-1/2 bg-[#f5edff] p-6 relative rounded-2xl shadow-lg mt-6 md:mt-0">
      <div class="flex items-center justify-center w-full h-full overflow-hidden rounded-2xl">
        <img src="{{ asset('assets/img/login.png') }}"
            alt="Illustration"
            class="object-cover w-full h-full" />
      </div>
    </div>

  </div>
@endsection
