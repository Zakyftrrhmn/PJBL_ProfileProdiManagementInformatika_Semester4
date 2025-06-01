@extends('layouts.auth')
@section('title', 'Halaman Login | Prodi Management Informatika')

@section('content')
<div class="flex h-screen w-full bg-[#1e1e2f] px-3 py-2">
  <!-- Left Section -->
  <div class="hidden md:flex w-1/2  items-center justify-center bg-[#1e1e2f] ">
    <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Logo" class="w-2/3 animate-fade-in" />
  </div>

  <!-- Right Section -->
  <div class="w-full md:w-1/2 flex items-center justify-center bg-[#1e1e2f]">
    <div class="w-full max-w-md px-6 sm:px-10 py-10 bg-[#1e1e2f] text-white rounded-xl shadow-lg md:shadow-white/10 animate-slide-up">
      <div class="text-center mb-6">
        <h2 class="text-3xl font-bold text-white">Welcome Back</h2>
        <p class="text-sm text-gray-400 mt-2">Please login to continue</p>
      </div>

      <!-- Session Flash -->
      @if(session('success'))
        <div class="bg-green-600 text-white text-sm rounded py-2 px-4 mb-4 text-center shadow">
          {{ session('success') }}
        </div>
      @endif

      <!-- Session Flash -->
      @if(session('error'))
        <div class="bg-red-600 text-white text-sm rounded py-2 px-4 mb-4 text-center shadow">
          {{ session('error') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.proses') }}">
        @csrf
        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-semibold mb-2">Email</label>
          <input type="email" name="email" id="email" placeholder="mail@user.com"
                 class="w-full px-4 py-2 rounded bg-[#2a2a40] text-sm text-white border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('email') border-red-500 dark:border-red-500 @enderror" required>
                 @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                 @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label for="password" class="block text-sm font-semibold mb-2">Password</label>
          <input type="password" name="password" id="password" placeholder="********"
                 class="w-full px-4 py-2 rounded bg-[#2a2a40] text-sm text-white border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('password') border-red-500 dark:border-red-500 @enderror" required>
                 @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                 @enderror
        </div>

        <!-- Login Button -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-full shadow-md mt-2">
          Login
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Animations -->
<style>
  @keyframes fade-in {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
  }
  .animate-fade-in {
    animation: fade-in 1s ease-out;
  }

  @keyframes slide-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-slide-up {
    animation: slide-up 0.8s ease-out;
  }
</style>
@endsection
