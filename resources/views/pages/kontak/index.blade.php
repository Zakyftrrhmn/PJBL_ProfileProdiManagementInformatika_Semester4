@extends('layouts.app') 
@section('title', 'Kontak Prodi')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
            @if (session('success'))
              <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                  {{ session('success') }}
                </div>  
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
              </div>
            @endif


        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
              <form 
                    action="{{ isset($kontak) ? route('admin.kontak.update', $kontak->id) : route('admin.kontak.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($kontak))
                        @method('PUT')
                    @endif


                    {{-- Link Facebook --}}
                    <div class="mb-4">
                        <label for="link_fb" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Link Facebook <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="link_fb" name="link_fb" 
                            value="{{ old('link_fb', $kontak->link_fb ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_fb') border-red-500 dark:border-red-500 @enderror">
                        @error('link_fb')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Twitter --}}
                    <div class="mb-4">
                        <label for="link_twitter" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Link Twitter <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="link_twitter" name="link_twitter" 
                            value="{{ old('link_twitter', $kontak->link_twitter ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_twitter') border-red-500 dark:border-red-500 @enderror">
                        @error('link_twitter')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Instagram --}}
                    <div class="mb-4">
                        <label for="link_instagram" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Link Instagram <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="link_instagram" name="link_instagram" 
                            value="{{ old('link_instagram', $kontak->link_instagram ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_instagram') border-red-500 dark:border-red-500 @enderror">
                        @error('link_instagram')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Whatsapp --}}
                    <div class="mb-4">
                        <label for="link_wa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Link Whatsapp <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="link_wa" name="link_wa" 
                            value="{{ old('link_wa', $kontak->link_wa ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_wa') border-red-500 dark:border-red-500 @enderror">
                        @error('link_wa')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Website --}}
                    <div class="mb-4">
                        <label for="link_website" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Link Website <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="link_website" name="link_website" 
                            value="{{ old('link_website', $kontak->link_website ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('link_website') border-red-500 dark:border-red-500 @enderror">
                        @error('link_website')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No Telp --}}
                    <div class="mb-4">
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            No Telp <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="no_telp" name="no_telp" 
                            value="{{ old('no_telp', $kontak->no_telp ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('no_telp') border-red-500 dark:border-red-500 @enderror">
                        @error('no_telp')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="gmail" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Email Prodi <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="gmail" name="gmail" 
                            value="{{ old('gmail', $kontak->gmail ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('gmail') border-red-500 dark:border-red-500 @enderror">
                        @error('gmail')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Lokasi Prodi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location" 
                            value="{{ old('location', $kontak->location ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('location') border-red-500 dark:border-red-500 @enderror">
                        @error('location')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Simpan Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
