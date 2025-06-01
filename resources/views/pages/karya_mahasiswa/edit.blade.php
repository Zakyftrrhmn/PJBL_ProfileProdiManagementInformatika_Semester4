@extends('layouts.app')
@section('title', 'Edit Data Karya Mahasiswa')
@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col mb-6 bg-white shadow-xl dark:bg-slate-850 rounded-2xl overflow-hidden">

            <div class="flex justify-between">
                <div class="p-6 pb-0">
                    <h6 class="dark:text-white">Form @yield('title')</h6>
                </div>
            </div>

            <div class="flex-auto px-6 pt-5 pb-6">
                <form action="{{ route('admin.karya_mahasiswa.update', $karya_mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Judul <span class="text-red-500">*</span></label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $karya_mahasiswa->judul) }}" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('judul') border-red-500 @enderror">
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label for="kategori_id" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kategori Karya <span class="text-red-500">*</span></label>
                        <select id="kategori_id" name="kategori_id" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('kategori_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori_karya as $item)
                                <option value="{{ $item->id }}" {{ (old('kategori_id', $karya_mahasiswa->kategori_id) == $item->id) ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                  {{-- Tahun --}}
                    <div class="mb-4">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Tahun <span class="text-red-500">*</span></label>
                        <select id="tahun" name="tahun" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('tahun') border-red-500 @enderror">
                            <option value="">-- Pilih Tahun --</option>
                            @for ($year = 2020; $year <= now()->year; $year++)
                                <option value="{{ $year }}" {{ old('tahun', $karya_mahasiswa->tahun) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        @error('tahun')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- Isi --}}
                    <div class="mb-4">
                        <label for="isi" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea id="editor" name="isi" rows="6" required
                            class="block w-full px-4 py-2 text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('isi') border-red-500 @enderror">{{ old('isi', $karya_mahasiswa->isi) }}</textarea>
                        @error('isi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div class="mb-4">
                        <label for="thumbnail" class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Thumbnail <span class="text-red-500">*</span></label>
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
                            class="block w-full text-sm text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 dark:bg-slate-700 dark:text-white dark:border-slate-600 @error('thumbnail') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Format file yang diizinkan: .jpg, .jpeg, .png (max 2mb)</p>
                        @if ($karya_mahasiswa->thumbnail)
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Thumbnail saat ini:</p>
                            <img src="{{ asset('storage/' . $karya_mahasiswa->thumbnail) }}" alt="Thumbnail Lama" class="mt-2 w-32 h-32 object-cover rounded-lg shadow">
                        @endif
                        
                        @error('thumbnail')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end">
                        <a href="{{ route('admin.karya_mahasiswa.index') }}"
                            class="mr-2 text-slate-700 dark:text-white border border-slate-300 hover:bg-slate-100 dark:border-slate-500 dark:hover:bg-slate-700 font-medium rounded-lg text-sm px-4 py-2">
                            Kembali
                        </a>
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 shadow-md">
                            Update Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{ asset('ckeditor/upload_image.php') }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endpush
