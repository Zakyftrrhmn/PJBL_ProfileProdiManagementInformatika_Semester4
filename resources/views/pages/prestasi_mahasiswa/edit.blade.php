@extends('layouts.app')
@section('title', 'Edit Data Prestasi Mahasiswa')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

            <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                <form action="{{ route('admin.prestasi_mahasiswa.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_mahasiswa" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Mahasiswa <span class="text-red-500">*</span></label>
                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_mahasiswa') border-red-500 dark:border-red-500 @enderror" value="{{ old('nama_mahasiswa', $prestasi->nama_mahasiswa) }}" required>
                        @error('nama_mahasiswa')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nim" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">NIM <span class="text-red-500">*</span></label>
                        <input type="text" id="nim" name="nim" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nim') border-red-500 dark:border-red-500 @enderror" value="{{ old('nim', $prestasi->nim) }}" required>
                        @error('nim')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_lomba" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama Lomba <span class="text-red-500">*</span></label>
                        <input type="text" id="nama_lomba" name="nama_lomba" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('nama_lomba') border-red-500 dark:border-red-500 @enderror" value="{{ old('nama_lomba', $prestasi->nama_lomba) }}" required>
                        @error('nama_lomba')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tingkat" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tingkat <span class="text-red-500">*</span></label>
                        <select id="tingkat" name="tingkat" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('tingkat') border-red-500 dark:border-red-500 @enderror" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="Lokal" {{ old('tingkat', $prestasi->tingkat) == 'Lokal' ? 'selected' : '' }}>Lokal</option>
                            <option value="Wilayah" {{ old('tingkat', $prestasi->tingkat) == 'Wilayah' ? 'selected' : '' }}>Wilayah</option>
                            <option value="Nasional" {{ old('tingkat', $prestasi->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('tingkat', $prestasi->tingkat) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                        @error('tingkat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="penyelenggara" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Penyelenggara <span class="text-red-500">*</span></label>
                        <input type="text" id="penyelenggara" name="penyelenggara" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('penyelenggara') border-red-500 dark:border-red-500 @enderror" value="{{ old('penyelenggara', $prestasi->penyelenggara) }}" required>
                        @error('penyelenggara')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_lomba" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tanggal Perlombaan <span class="text-red-500">*</span></label>
                        <input type="date" id="tanggal_lomba" name="tanggal_lomba" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('tanggal_lomba') border-red-500 dark:border-red-500 @enderror" value="{{ old('tanggal_lomba', $prestasi->tanggal_lomba) }}" required>
                        @error('tanggal_lomba')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="peringkat" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Peringkat <span class="text-red-500">*</span>></label>
                        <input type="text" id="peringkat" name="peringkat" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('peringkat') border-red-500 dark:border-red-500 @enderror" value="{{ old('peringkat', $prestasi->peringkat) }}" required>
                        @error('peringkat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="file_sertifikat" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Upload Sertifikat <span class="text-red-500">*</span></label>
                        <input type="file" id="file_sertifikat" name="file_sertifikat" accept=".jpg,.jpeg,.png" class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('file_sertifikat') border-red-500 dark:border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Format file yang diizinkan: .jpg, .jpeg, .png (max 2mb)</p>
                        @error('file_sertifikat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        @if ($prestasi->file_sertifikat)
                            <p class="text-sm mt-1 text-slate-500 dark:text-slate-300">File saat ini: <a href="{{ asset('storage/' . $prestasi->file_sertifikat) }}" target="_blank" class="text-blue-600 underline">Lihat Sertifikat</a></p>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('admin.prestasi_mahasiswa.index') }}" class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Update Data
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
