@extends('layouts.app')
@section('title', 'Pesan Masuk')
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

            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border  overflow-hidden">
              <div class="flex justify-between">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <h6 class="dark:text-white">Daftar @yield('title') </h6>
                </div>
              </div>
              
              <div class="flex-auto px-0 pt-5 pb-2">
                <div class="p-4 overflow-x-auto">
                  <table id="hubungiKamiTable" class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        
                        <th class="px-6 py-3 font-bold !text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-left">Email</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pesan</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="border-t">
                      @foreach ($hubungiKami as $hk)
                      <tr>

                        <td class=" align-middle bg-transparent">
                          <div class="my-auto ">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      whitespace-normal break-words
                                      text-center">
                                      {{ $loop->iteration }}
                            </h6>
                          </div>
                        </td>
                          
                        <td class=" align-middle bg-transparent">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      whitespace-normal break-words
                                      text-justify">
                                      {{ $hk->nama }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      whitespace-normal break-words
                                      text-justify">
                                      {{ $hk->email }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      truncate
                                      text-justify">
                                      {{ Str::limit($hk->pesan, 20) }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent items-center ">
                            <div class="flex space-x-1 justify-center">
                                <a href="{{ route('admin.hubungi_kami.show', $hk) }}" class="text-green-400 hover:text-white border border-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-green-300 dark:text-green-300 dark:hover:text-white dark:hover:bg-green-400 dark:focus:ring-green-900">
                                <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                                <form
                                    action="{{ route('admin.hubungi_kami.destroy', $hk) }}"
                                    method="POST"
                                    x-data {{-- Ini penting untuk mengaktifkan Alpine.js pada form ini --}}
                                    @submit.prevent="$dispatch('open-delete-modal', { form: $event.target })" {{-- Ini akan mencegah submit default dan memicu modal --}}
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                        {{-- Hapus atribut onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" --}}
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
        if (document.getElementById("hubungiKamiTable") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#hubungiKamiTable", {
                paging: true,
                perPage: 10,
                perPageSelect: [5, 10, 15, 20, 25],
                sortable: false
            });
        }
    });
</script>
@endpush

