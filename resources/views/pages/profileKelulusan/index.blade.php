@extends('layouts.app')
@section('title', 'Profil Lulusan')

@section('content')
<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">

    @if (session('success'))
    <div id="alert-success" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>
      <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
      <button type="button" class="ms-auto bg-green-50 text-green-500 hover:bg-green-200 p-1.5 rounded-lg" data-dismiss-target="#alert-success">
        <svg class="w-3 h-3" viewBox="0 0 14 14" fill="none"><path d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" stroke="currentColor" stroke-width="2"/></svg>
      </button>
    </div>
    @endif

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl overflow-hidden">
      <div class="flex justify-between items-center px-6 pt-6">
        <h6 class="dark:text-white">Tabel @yield('title')</h6>
        <a href="{{ route('admin.profile_kelulusan.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Tambah Data</a>
      </div>

      <div class="flex-auto px-0 pt-5 pb-2">
        <div class="p-4 overflow-x-auto">
          <table id="profileTables" class="w-full border-collapse text-slate-500 dark:border-white/40">
            <thead>
              <tr>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Profil</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Capaian Pembelajaran</th>
                <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Action</th>
              </tr>
            </thead>
            <tbody class="border-t">
              @foreach ($profileKelulusan as $p)
              <tr>
                <td class="px-6 py-2 text-sm align-top dark:text-white whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-2 text-sm align-top dark:text-white break-words max-w-sm">{{ $p->nama_profile }}</td>
                <td class="px-6 py-2 text-sm align-top dark:text-white break-words max-w-lg">{{ $p->deskripsi }}</td>
                <td class="px-6 py-2 text-sm text-center">
                  <div class="flex justify-center space-x-2">
                    <a href="{{ route('admin.profile_kelulusan.edit', $p) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:bg-yellow-400 flex items-center">
                      <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form
                        action="{{ route('admin.profile_kelulusan.destroy', $p) }}"
                        method="POST"
                        x-data {{-- Ini mengaktifkan Alpine.js pada elemen form ini --}}
                        @submit.prevent="$dispatch('open-delete-modal', { form: $event.target })" {{-- Ini akan mencegah submit default dan memicu modal --}}
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 flex items-center"
                            {{-- Hapus atribut onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" dari tag <form> --}}
                        >
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
    if (document.getElementById("profileTables") && typeof simpleDatatables !== 'undefined') {
      new simpleDatatables.DataTable("#profileTables", {
        paging: true,
        perPage: 10,
        perPageSelect: [5, 10, 20, 50],
        sortable: false
      });
    }
  });
</script>
@endpush
