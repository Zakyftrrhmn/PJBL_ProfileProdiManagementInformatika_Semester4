@extends('layouts.app')
@section('title', 'Informasi')
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

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-hidden">
      <div class="flex justify-between">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white">Tabel @yield('title')</h6>
        </div>
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <a href="{{ route('admin.informasi.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah Data</a>
        </div>
      </div>

      <div class="flex-auto px-0 pt-5 pb-2">
        <div class="p-4 overflow-x-auto">
          <table id="informasiTables" class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">No</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Judul</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Thumbnail</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Dibuat Oleh</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Dibuat Pada</th>
                <th class="px-6 py-3 font-bold !text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Kategori</th>
                <th class="px-6 py-3 font-bold !text-center uppercase align-middle bg-transparent border-b dark:border-white/40 dark:text-white text-xxs border-b-solid text-slate-400 opacity-70">Aksi</th>
              </tr>
            </thead>
            <tbody class="border-t">
              @foreach ($informasi as $i)
              <tr>
                <td class="px-6 py-3 align-middle bg-transparent">
                  <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $loop->iteration }}</h6>
                </td>
                <td class="px-6 py-3 align-middle bg-transparent">
                  <h6 class="mb-0 text-sm leading-normal dark:text-white text-justify">
                    {{ \Illuminate\Support\Str::limit($i->judul, 20) }}
                  </h6>
                </td>
                <td class="px-6 py-3 align-middle bg-transparent">
                 <img src="{{ asset('storage/' . $i->thumbnail) }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg shadow-md transition-transform duration-300 hover:scale-105" />
                </td>
                <td class="px-6 py-3 align-middle bg-transparent">
                  <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $i->user->name }}</h6>
                </td>
                <td class="px-6 py-3 align-middle bg-transparent">
                  <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $i->created_at->translatedFormat('d F Y') }}
</h6>
                </td>
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
                        'bg-lime-100 text-lime-800',
                        'bg-cyan-100 text-cyan-800',
                        'bg-rose-100 text-rose-800',
                        'bg-gray-100 text-gray-800',
                    ];

                    // Buat index berdasarkan ASCII dari nama kategori
                    $kategoriNama = strtolower($i->kategori->nama_kategori);
                    $index = crc32($kategoriNama) % count($colors);
                    $colorClass = $colors[$index];
                @endphp
                <td class="px-6 py-3 align-middle bg-transparent text-center">
                  <span class="{{ $colorClass }} text-xs font-semibold px-6 uppercase py-2 rounded-full">
                    {{ $i->kategori->nama_kategori }}
                  </span>
                </td>


                <td class="px-6 py-3 align-middle bg-transparent text-center whitespace-nowrap">
                  <div class="flex space-x-1 justify-center">
                    <a href="{{ route('admin.informasi.show', $i) }}" class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-400 dark:focus:ring-blue-900">
                      <i class="fas fa-eye mr-1"></i> Show
                    </a>
                    <a href="{{ route('admin.informasi.edit', $i) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                      <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.informasi.destroy', $i) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
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
    if (document.getElementById("informasiTables") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
      const dataTable = new simpleDatatables.DataTable("#informasiTables", {
        paging: true,
        perPage: 10,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: false
      });
    }
  });
</script>
@endpush
