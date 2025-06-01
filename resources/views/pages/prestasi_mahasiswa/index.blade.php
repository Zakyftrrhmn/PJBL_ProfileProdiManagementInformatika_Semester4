@extends('layouts.app')
@section('title', 'Pres. Mahasiswa')
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
                  <h6 class="dark:text-white">@yield('title') </h6>
                </div>
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                      <a href="{{ route('admin.prestasi_mahasiswa.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah Data</a>
                </div>
              </div>
              
              <div class="flex-auto px-0 pt-5 pb-2">
                <div class="p-4 overflow-x-auto">
                  <table id="prestasi_mahasiswaTable" class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Mahasiswa</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">NIM</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-left">Nama Lomba</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Tingkat</th>
                       <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">
                        Prestasi</th>
                        <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 !text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="border-t">
                      @foreach ($prestasi as $p)
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
                                      {{ $p->nama_mahasiswa }}
                            </h6>
                          </div>
                        </td>

                        <td class=" align-middle bg-transparent ">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white
                                      max-w-xl
                                      tracking-none whitespace-nowrap
                                      text-justify">
                                      {{ $p->nim }}
                            </h6>
                          </div>
                        </td>

                          <td class="align-middle bg-transparent">
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm leading-normal dark:text-white truncate max-w-[200px]">
                                {{ $p->nama_lomba }}
                              </h6>
                            </div>
                          </td>

                          <td class="align-middle">
                            @php
                                $tingkat = $p->tingkat;
                                $warna = match($tingkat) {
                                    'Lokal' => ['text' => 'text-slate-700', 'bg' => 'bg-slate-200'],
                                    'Wilayah' => ['text' => 'text-yellow-700', 'bg' => 'bg-yellow-200'],
                                    'Nasional' => ['text' => 'text-blue-700', 'bg' => 'bg-blue-200'],
                                    'Internasional' => ['text' => 'text-purple-700', 'bg' => 'bg-purple-200'],
                                    default => ['text' => 'text-gray-700', 'bg' => 'bg-gray-200'],
                                };
                            @endphp

                            <div class="my-auto">
                              <h6 class="mb-0 text-sm font-semibold text-center px-3 py-1 rounded-full whitespace-nowrap {{ $warna['text'] }} {{ $warna['bg'] }}">
                                {{ $tingkat }}
                              </h6>
                            </div>
                          </td>


                        <td class="align-middle ">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm font-semibold text-center px-3 py-1 text-blue-700 bg-blue-200 rounded-full whitespace-nowrap">
                              {{ $p->peringkat }}
                            </h6>
                          </div>
                        </td>

                        <td class="align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent items-center ">
                            <div class="flex space-x-1 justify-center">
                              <a href="{{ route('admin.prestasi_mahasiswa.show', $p) }}" class="text-blue-400 hover:text-white border border-blue-400 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-400 dark:focus:ring-blue-900">
                                <i class="fas fa-eye mr-1"></i> Show
                                </a>

                                <a href="{{ route('admin.prestasi_mahasiswa.edit', $p) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 text-center  dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.prestasi_mahasiswa.destroy', $p) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 text-center  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
                if (document.getElementById("prestasi_mahasiswaTable") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
                    const dataTable = new simpleDatatables.DataTable("#prestasi_mahasiswaTable", {
                        paging: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 15, 20, 25],
                        sortable: false
                    });
                }
            });
        </script>
@endpush

