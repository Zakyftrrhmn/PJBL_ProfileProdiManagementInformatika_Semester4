@extends('layouts.app')
@section('title', 'Karya Mahasiswa')
@section('content')

<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">

    @if (session('success'))
      <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>
        <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>  
        <button type="button" class="ms-auto bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400" data-dismiss-target="#alert-3" aria-label="Close">
          <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
        </button>
      </div>
    @endif

    <div class="relative flex flex-col mb-6 bg-white shadow-xl dark:bg-slate-850 rounded-2xl overflow-hidden">
      <div class="flex justify-between">
        <div class="p-6">
          <h6 class="dark:text-white">Tabel @yield('title')</h6>
        </div>
        <div class="p-6">
          <a href="{{ route('admin.karya_mahasiswa.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Tambah Data</a>
        </div>
      </div>

      <div class="px-0 pt-5 pb-2">
        <div class="p-4 overflow-x-auto">
          <table id="karyaTables" class="w-full text-slate-500">
            <thead>
              <tr>
                <th class="px-6 py-3 text-left text-xxs font-bold uppercase dark:text-white text-slate-400">No</th>
                <th class="px-6 py-3 text-left text-xxs font-bold uppercase dark:text-white text-slate-400">Judul</th>
                <th class="px-6 py-3 text-left text-xxs font-bold uppercase dark:text-white text-slate-400">Thumbnail</th>
                <th class="px-6 py-3 text-left text-xxs font-bold uppercase dark:text-white text-slate-400">Tahun</th>
                <th class="px-6 py-3 text-center text-xxs font-bold uppercase dark:text-white text-slate-400">Kategori</th>
                <th class="px-6 py-3 text-center text-xxs font-bold uppercase dark:text-white text-slate-400">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($karya_mahasiswa as $k)
              <tr>
                <td class="px-6 py-3">{{ $loop->iteration }}</td>
                <td class="px-6 py-3 text-sm text-justify dark:text-white">{{ $k->judul }}</td>
                <td class="px-6 py-3">
                  <img src="{{ asset('storage/' . $k->thumbnail) }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded shadow hover:scale-105 transition" />
                </td>
                <td class="px-6 py-3 text-sm dark:text-white">{{ $k->tahun }}</td>
                @php
                  $colors = [
                      'bg-blue-100 text-blue-800',
                      'bg-yellow-100 text-yellow-800',
                      'bg-green-100 text-green-800',
                      'bg-red-100 text-red-800',
                      'bg-purple-100 text-purple-800',
                      'bg-pink-100 text-pink-800',
                      'bg-indigo-100 text-indigo-800',
                      'bg-teal-100 text-teal-800',
                      'bg-orange-100 text-orange-800',
                      'bg-gray-100 text-gray-800',
                  ];
                  $index = crc32(strtolower($k->kategori_karya->nama_kategori)) % count($colors);
                  $colorClass = $colors[$index];
                @endphp
                <td class="px-6 py-3 text-center">
                  <span class="{{ $colorClass }} text-xs font-semibold px-4 py-1 rounded-full uppercase">{{ $k->kategori_karya->nama_kategori }}</span>
                </td>
                <td class="px-6 py-3 text-center whitespace-nowrap">
                  <div class="flex justify-center space-x-1">
                    <a href="{{ route('admin.karya_mahasiswa.show', $k) }}" class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 font-medium rounded-lg text-xs px-3 py-2">
                      <i class="fas fa-eye mr-1"></i> Show
                    </a>
                    <a href="{{ route('admin.karya_mahasiswa.edit', $k) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-xs px-3 py-2">
                      <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.karya_mahasiswa.destroy', $k) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 font-medium rounded-lg text-xs px-3 py-2">
                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("karyaTables") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
      new simpleDatatables.DataTable("#karyaTables", {
        paging: true,
        perPage: 10,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: false
      });
    }
  });
</script>
@endpush
