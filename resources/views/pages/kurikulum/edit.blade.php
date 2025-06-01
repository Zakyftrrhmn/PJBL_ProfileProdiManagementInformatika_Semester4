@extends('layouts.app')
@section('title', 'Edit Data Kurikulum')
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
                <form action="{{ route('admin.kurikulum.update', $kurikulum->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="kode_mk" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kode Mata Kuliah <span class="text-red-500">*</span></label>
                        <input type="text" id="kode_mk" name="kode_mk" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('kode_mk') border-red-500 dark:border-red-500 @enderror" value="{{ old('kode_mk', $kurikulum->kode_mk) }}" required>
                        @error('kode_mk')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mata_kuliah" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Mata Kuliah <span class="text-red-500">*</span></label>
                        <input type="text" id="mata_kuliah" name="mata_kuliah" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('mata_kuliah') border-red-500 dark:border-red-500 @enderror" value="{{ old('mata_kuliah', $kurikulum->mata_kuliah) }}" required>
                        @error('mata_kuliah')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bentuk_perkuliahan" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Bentuk Perkuliahan <span class="text-red-500">*</span></label>
                        <select id="bentuk_perkuliahan" name="bentuk_perkuliahan" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('bentuk_perkuliahan') border-red-500 dark:border-red-500 @enderror" required>
                            <option value="">-- Pilih Bentuk Perkuliahan --</option>
                            <option value="Teori" {{ old('bentuk_perkuliahan', $kurikulum->bentuk_perkuliahan) == 'Teori' ? 'selected' : '' }}>Teori</option>
                            <option value="Praktek" {{ old('bentuk_perkuliahan', $kurikulum->bentuk_perkuliahan) == 'Praktek' ? 'selected' : '' }}>Praktek</option>
                            <option value="Teori & Praktek" {{ old('bentuk_perkuliahan', $kurikulum->bentuk_perkuliahan) == 'Teori & Praktek' ? 'selected' : '' }}>Teori & Praktek</option>
                        </select>
                        @error('bentuk_perkuliahan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="semester" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Semester <span class="text-red-500">*</span></label>
                        <select id="semester" name="semester" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('semester') border-red-500 dark:border-red-500 @enderror" required>
                            <option value="">-- Pilih Semester --</option>
                            @for($i = 1; $i <= 6; $i++)
                                <option value="Semester {{ $i }}" {{ old('semester', $kurikulum->semester) == 'Semester '.$i ? 'selected' : '' }}>
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </select>
                        @error('semester')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="sks" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Jumlah SKS <span class="text-red-500">*</span></label>
                        <input type="number" id="sks" name="sks" class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('sks') border-red-500 dark:border-red-500 @enderror" value="{{ old('sks', $kurikulum->sks) }}" required>
                        @error('sks')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="rps" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Upload RPS <span class="text-red-500">*</span></label>
                        <input type="file" id="rps" name="rps" accept=".pdf,.doc,.docx" class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('rps') border-red-500 dark:border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Format file yang diizinkan: .pdf, .doc, .docx</p>
                        @error('rps')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        @if($kurikulum->rps)
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                                File saat ini: <a href="{{ asset('storage/rps/' . $kurikulum->rps) }}" target="_blank" class="text-blue-600 underline">Lihat RPS</a>
                            </p>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('admin.kurikulum.index') }}" class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
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
