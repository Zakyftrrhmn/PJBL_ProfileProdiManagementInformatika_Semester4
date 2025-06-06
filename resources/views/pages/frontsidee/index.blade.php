@extends('layouts.app') 
@section('title', 'Isi Frontside')
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
                    action="{{ isset($frontside) ? route('admin.frontside.update', $frontside->id) : route('admin.frontside.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($frontside))
                        @method('PUT')
                    @endif


                    {{-- HERO SECTION --}}
                    <div class="mb-4">
                        <label for="hero_title" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Hero Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="hero_title" name="hero_title"
                            value="{{ old('hero_title', $frontside->hero_title ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('hero_title') border-red-500 dark:border-red-500 @enderror">
                        @error('hero_title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hero_subtitle" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Hero Subtitle <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="hero_subtitle" name="hero_subtitle"
                            value="{{ old('hero_subtitle', $frontside->hero_subtitle ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('hero_subtitle') border-red-500 dark:border-red-500 @enderror">
                        @error('hero_subtitle')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="hero_description" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Hero Description <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="hero_description" name="hero_description"
                            value="{{ old('hero_description', $frontside->hero_description ?? '') }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('hero_description') border-red-500 dark:border-red-500 @enderror">
                        @error('hero_description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SECTION LAINNYA --}}
                    @foreach ([
                        'intro_title' => 'Intro Title',
                        'intro_description' => 'Intro Description',
                        'visi_misi_title' => 'Visi Misi Title',
                        'visi_misi_subtitle' => 'Visi Misi Subtitle',
                        'visi_misi_description' => 'Visi Misi Description',
                        'why_join_title' => 'Why Join Title',
                        'why_join_description' => 'Why Join Description',
                        'karya_title' => 'Karya Title',
                        'karya_subtitle' => 'Karya Subtitle',
                        'karya_description' => 'Karya Description',
                        'dosen_title' => 'Dosen Title',
                        'dosen_subtitle' => 'Dosen Subtitle',
                        'dosen_description' => 'Dosen Description',
                        'information_title' => 'Information Title',
                        'information_subtitle' => 'Information Subtitle',
                        'information_description' => 'Information Description',
                        'penutup_title' => 'Penutup Title',
                        'penutup_description' => 'Penutup Description',
                        'kurikulum_title' => 'Kurikulum Title',
                        'kurikulum_subtitle' => 'Kurikulum Subtitle',
                        'kurikulum_description' => 'Kurikulum Description',
                        'akreditasi_title' => 'Akreditasi Title',
                        'akreditasi_subtitle' => 'Akreditasi Subtitle',
                        'akreditasi_description' => 'Akreditasi Description',
                        'kalender_title' => 'Kalender Title',
                        'kalender_subtitle' => 'Kalender Subtitle',
                        'profile_title' => 'Profile Title',
                        'profile_subtitle' => 'Profile Subtitle',
                        'profile_description' => 'Profile Description',
                        'laporan_title' => 'Laporan Title',
                        'laporan_subtitle' => 'Laporan Subtitle',
                        'laporan_description' => 'Laporan Description',
                        'galeri_title' => 'Galeri Title',
                        'galeri_subtitle' => 'Galeri Subtitle',
                        'galeri_description' => 'Galeri Description',
                        'prestasi_title' => 'Prestasi Title',
                        'prestasi_subtitle' => 'Prestasi Subtitle',
                        'prestasi_description' => 'Prestasi Description',
                        'kontak_title' => 'Kontak Title',
                        'kontak_description' => 'Kontak Description',
                    ] as $field => $label)
                        <div class="mb-4">
                            <label for="{{ $field }}" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                                {{ $label }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="{{ $field }}" name="{{ $field }}"
                                value="{{ old($field, $frontside->$field ?? '') }}" required
                                class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error($field) border-red-500 dark:border-red-500 @enderror">
                            @error($field)
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach

                    {{-- VIDEO UPLOAD --}}
                    <div class="mb-4">
                        <label for="visi_misi_video_url" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Visi Misi Video (MP4)
                        </label>

                        @if(isset($frontside) && $frontside->visi_misi_video_url)
                            <video width="320" height="240" controls class="mb-2 rounded-lg">
                                <source src="{{ asset('storage/' . $frontside->visi_misi_video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                        <input type="file" id="visi_misi_video_url" name="visi_misi_video_url" accept="video/mp4"
                            class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm
                            file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700
                            dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('visi_misi_video_url') border-red-500 dark:border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                            Format file yang diizinkan: .mp4 | Maksimal ukuran: 20MB
                        </p>
                        @error('visi_misi_video_url')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="why_join_video_url" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                            Why Join Video (MP4)
                        </label>

                        @if(isset($frontside) && $frontside->why_join_video_url)
                            <video width="320" height="240" controls class="mb-2 rounded-lg">
                                <source src="{{ asset('storage/' . $frontside->why_join_video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                        <input type="file" id="why_join_video_url" name="why_join_video_url" accept="video/mp4"
                            class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm
                            file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700
                            dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('why_join_video_url') border-red-500 dark:border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                            Format file yang diizinkan: .mp4 | Maksimal ukuran: 20MB
                        </p>
                        @error('why_join_video_url')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                    <label for="banner" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">
                        Banner <span class="px-2 py-1 rounded-full text-xs bg-red-200 text-red-800">Ukuran Disarankan: 612 x 321 px</span>
                    </label>

                    @if(isset($frontside) && $frontside->banner)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $frontside->banner) }}" alt="Banner Image" class="rounded-lg shadow-md" style="max-width: 100%; height: auto;">
                        </div>
                    @endif

                    <input type="file" id="banner" name="banner" accept="image/*"
                        class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm
                        file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700
                        dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('banner') border-red-500 dark:border-red-500 @enderror">

                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                        Format gambar yang diizinkan: JPG, PNG, JPEG
                    </p>

                    @error('banner')
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
