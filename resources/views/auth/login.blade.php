@extends('layouts.auth')
@section('title', 'Halaman Login | MI Pelalawan') 

@section('content')

<a href="{{ route('beranda') }}" class="hidden md:flex absolute top-12 -left-1 items-center space-x-2 bg-white rounded-br-full rounded-tr-full p-2 pr-4 shadow-md">
    <img src="{{ asset('assets/img/back-square-svgrepo-com.svg') }}" alt="Logo" class="w-8 h-8 md:w-10 md:h-10">
    <span class="text-lg md:text-xl font-bold text-gray-800">MI Pelalawan</span>
</a>
        
<div class="flex flex-col md:flex-row w-full max-w-6xl mx-auto overflow-hidden relative z-10">
    <div class="relative w-full md:w-[55%] flex items-end justify-center p-6 md:p-10 min-h-[300px] md:min-h-full">
        <img src="{{ asset('assets/img/login.svg') }}" alt="Ilustrasi Login" class="w-full h-auto object-contain max-h-[80%] md:max-h-full">
    </div>

    <div class="w-auto md:w-[45%] h-auto bg-white p-6 md:p-12 flex flex-col justify-center rounded-t-3xl md:rounded-3xl shadow-lg my-0 md:my-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 text-center">WELCOME BACK!</h1>
        <p class="text-gray-500 text-sm mb-8 text-center">Login untuk dapat mengakses halaman frontside MI Pelalawan</p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form class="space-y-5 mt-6" method="POST" action="{{ route('login.proses') }}">
            @csrf
            <div>
                {{-- Label sr-only untuk aksesibilitas, karena ikon sudah jelas --}}
                <label for="email" class="sr-only">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        {{-- Ikon email --}}
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email"
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl shadow-sm outline-none
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                  bg-gray-50 transition-all duration-200
                                  @error('email') border-red-500 ring-red-500 @enderror
                                  peer" {{-- Tambahkan 'peer' untuk styling disabled --}}
                           value="{{ old('email') }}" required />
                </div>
                {{-- Ini akan menampilkan pesan error lockout --}}
                @error('email')
                    <p id="email-error" class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        {{-- Ikon gembok --}}
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password"
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl shadow-sm outline-none
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                  bg-gray-50 transition-all duration-200
                                  @error('password') border-red-500 ring-red-500 @enderror
                                  peer" {{-- Tambahkan 'peer' untuk styling disabled --}} required />
                </div>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" id="login-button"
                    class="w-full flex items-center justify-center py-3 px-4 bg-blue-600 hover:bg-blue-700
                           text-white font-bold text-lg rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{-- Ikon panah --}}
                <svg class="w-5 h-5 mr-2 -rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a.75.75 0 01.75.75v10.638l3.96-4.03a.75.75 0 111.08 1.04l-5.25 5.375a.75.75 0 01-1.08 0l-5.25-5.375a.75.75 0 111.08-1.04l3.96 4.03V2.75A.75.75 0 0110 2z" clip-rule="evenodd" />
                </svg>
                MASUK
            </button>
            <p class="text-sm text-center text-gray-400 mt-4">© 2025 Manajemen Informatika PSDKU Pelalawan</p>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const emailErrorContainer = document.getElementById('email-error'); // Container for the error message

        let lockoutSeconds = 0;
        let originalErrorMessage = '';

        if (emailErrorContainer) {
            originalErrorMessage = emailErrorContainer.textContent;
            const match = originalErrorMessage.match(/(\d+) detik/); 
            if (match && match[1]) {
                lockoutSeconds = parseInt(match[1]);
            }
        }

        function updateCountdown() {
            if (lockoutSeconds > 0) {
                // Display the countdown message prominently
                if (emailErrorContainer) {
                    emailErrorContainer.textContent = `Terlalu banyak percobaan login. Silakan coba lagi dalam ${lockoutSeconds} detik.`;
                    emailErrorContainer.classList.remove('text-green-600'); // Ensure it's red during countdown
                    emailErrorContainer.classList.add('text-red-600');
                }
                
                // Disable inputs and button
                emailInput.disabled = true;
                passwordInput.disabled = true;
                loginButton.disabled = true;
                loginButton.classList.add('opacity-50', 'cursor-not-allowed');
                emailInput.classList.add('bg-gray-200', 'cursor-not-allowed'); // Add disabled visual for inputs
                passwordInput.classList.add('bg-gray-200', 'cursor-not-allowed'); // Add disabled visual for inputs

                lockoutSeconds--;

            } else {
                clearInterval(countdownInterval);
                if (emailErrorContainer) {
                    emailErrorContainer.textContent = 'Silakan coba login kembali.';
                    emailErrorContainer.classList.remove('text-red-600');
                    emailErrorContainer.classList.add('text-green-600'); 
                }

                // Re-enable inputs and button
                emailInput.disabled = false;
                passwordInput.disabled = false;
                loginButton.disabled = false;
                loginButton.classList.remove('opacity-50', 'cursor-not-allowed');
                emailInput.classList.remove('bg-gray-200', 'cursor-not-allowed'); // Remove disabled visual
                passwordInput.classList.remove('bg-gray-200', 'cursor-not-allowed'); // Remove disabled visual
            }
        }

        if (lockoutSeconds > 0) {
            updateCountdown(); // Call immediately to display initial state
            let countdownInterval = setInterval(updateCountdown, 1000);
        }
    });
</script>

@endsection
