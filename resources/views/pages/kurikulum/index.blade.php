@extends('layouts.app')
@section('title', 'Kurikulum')
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
                  <h6 class="dark:text-white">Tabel @yield('title') </h6>
                </div>
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                      <a href="{{ route('admin.kurikulum.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah Data</a>
                </div>
              </div>
              
              <div class="flex-auto px-0 pt-5 pb-2">
                <div class="p-4 overflow-x-auto">
                  <table id="kurikulumTable" class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kode MK</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-left">Mata Kuliah</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Semester</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Pembelajaran</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">SKS</th>
                       <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">RPS</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="border-t">
                      @foreach ($kurikulum as $k)
                      <tr>

                        <td class="align-middle  ">
                          <div class="my-auto ">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      tracking-none whitespace-nowrap
                                      text-justify">
                                      {{ $loop->iteration }}
                            </h6>
                          </div>
                        </td>
                          
                        <td class=" align-middle bg-transparent ">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      tracking-none whitespace-nowrap
                                      text-justify">
                                      {{ $k->kode_mk }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      break-words 
                                      text-justify ">
                                      {{ $k->mata_kuliah }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent text-center ">
                          <div class="my-auto">
                            @php
                                $bgColor = match($k->semester) {
                                    'Semester 1' => 'bg-blue-300 text-blue-800',
                                    'Semester 2' => 'bg-green-300 text-green-800',
                                    'Semester 3' => 'bg-yellow-300 text-yellow-800',
                                    'Semester 4' => 'bg-purple-300 text-purple-800',
                                    'Semester 5' => 'bg-pink-300 text-pink-800',
                                    'Semester 6' => 'bg-indigo-300 text-indigo-800',
                                    default => 'bg-gray-300 text-gray-800',
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-sm font-semibold tracking-none whitespace-nowrap  {{ $bgColor }}">
                                {{ $k->semester }}
                            </span>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent">
                          <div class="my-auto">
                              @php
                                $perkuliahan = match($k->bentuk_perkuliahan) {
                                    'Teori' => 'T',
                                    'Praktek' => 'P',
                                    'Teori & Praktek' => 'T/P',
                                };
                            @endphp
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      break-words 
                                      text-center ">
                                      {{ $perkuliahan }}
                            </h6>
                          </div>
                        </td>

                        <td class=" align-middle bg-transparent text-center">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      tracking-none whitespace-nowrap
                                      text-center">
                                      {{ $k->sks }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent text-center">
                          <div class="my-auto">                            
                            @if ($k->rps)
                              <a 
                                href="{{ asset('storage/kurikulum/' . $k->rps) }}" 
                                download 
                                class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center  dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-400 dark:focus:ring-blue-900" target="_blank" rel="noopener noreferrer"
                              >
                                <i class="fas fa-download mr-1"></i> Download
                              </a>
                            @endif
                          </div>
                        </td>

                        <td class="align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent items-center ">
                            <div class="flex space-x-1 justify-center">
                                <a href="{{ route('admin.kurikulum.edit', $k) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 text-center  dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            <form
                                action="{{ route('admin.kurikulum.destroy', $k) }}"
                                method="POST"
                                x-data {{-- Ini penting untuk mengaktifkan Alpine.js pada form ini --}}
                                @submit.prevent="$dispatch('open-delete-modal', { form: $event.target })" {{-- Ini yang akan memicu modal --}}
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
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
                if (document.getElementById("kurikulumTable") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
                    const dataTable = new simpleDatatables.DataTable("#kurikulumTable", {
                        paging: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 15, 20, 25],
                        sortable: false
                    });
                }
            });
        </script>
@endpush

