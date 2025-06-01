<aside id="sidenav-main" class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 xl:ml-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0 overflow-hidden" aria-expanded="false">

    <div class="h-19">
         <i
          class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
          sidenav-close
        ></i>
        <div class="flex items-center px-6 py-4 space-x-2 ">
         <img src="{{ asset('assets/img/logo.png') }}" class="inline h-7 max-w-7 transition-all duration-200 dark:hidden ease-nav-brand max-h-7" alt="main_logo" />
          <img src="{{ asset('assets/img/logo-dark.png') }}" class="hidden h-7 max-w-7 transition-all duration-200 dark:inline ease-nav-brand max-h-7" alt="main_logo" />
            <div class="leading-tight text-sm text-slate-700 dark:text-white font-semibold">
                <div>Management Informatika</div>
                <div class="text-xs text-slate-500 dark:text-slate-300">PSDKU Pelalawan</div>
            </div>
    </div>

    </div>
    
      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto max-h-screen h-full pb-20 overflow-y-scroll grow basis-full" >

        <ul class="flex flex-col pl-0 mb-0">



            @can('kurikulum')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/kurikulum*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}}" href="{{route('admin.kurikulum.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-book-bookmark text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Kurikulum</span>
                </a>
            </li>
            @endcan

            @can('dosen')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/dosen*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}} " href="{{route('admin.dosen.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-single-02 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Dosen</span>
                </a>
            </li>
            @endcan

            @can('kalender-akademik')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/kalender_akademik*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.kalender_akademik.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-calendar-grid-58 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Kalender Akademik</span>
                </a>
            </li>
            @endcan

            @can('akreditasi')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/akreditasi*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.akreditasi.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-badge text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">akreditasi</span>
                </a>
            </li>
            @endcan

            @can('profile-kelulusan')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/profile_kelulusan*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.profile_kelulusan.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-briefcase-24 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Profile Lulusan</span>
                </a>
            </li>
            @endcan

            @can('laporan_kepuasan')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/laporan_kepuasan*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.laporan_kepuasan.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-satisfied text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Laporan Kepuasan</span>
                </a>
            </li>
            @endcan
            
            @can('gallery')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/gallery*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.gallery.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-image text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Gallery</span>
                </a>
            </li>
            @endcan

            @can('prestasi_mahasiswa')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/prestasi_mahasiswa*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="{{route('admin.prestasi_mahasiswa.index')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-trophy text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Prestasi Mahasiswa</span>
                </a>
            </li>
            @endcan

            @can('karya_mahasiswa')
            <li x-data="{ open: {{ Request::is('admin/karya_mahasiswa*') || Request::is('admin/kategori_karya*') ? 'true' : 'false' }} }" class="mt-0.5 w-full px-2">
                <!-- Bungkus button dalam rounded div -->
                <div class="rounded-lg overflow-hidden">
                    <button @click="open = !open" class="w-full py-2 text-sm ease-nav-brand flex items-center justify-between whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700">
                        <div class="flex items-center">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center text-center xl:p-2.5">
                                <i class="ni ni-bulb-61	 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            </div>
                            <span class="ml-1">Karya Mahasiswa</span>
                        </div>
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown Items -->
                <ul x-show="open" x-transition x-cloak class="ml-6 mt-1 space-y-1">
                    <li>
                        <a href="{{route('admin.karya_mahasiswa.index')}}" class="py-2 text-sm ease-nav-brand flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/karya_mahasiswa*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-bullet-list-67 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Daftar Karya  </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.kategori_karya.index')}}" class="py-2 text-sm ease-nav-brand flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/kategori_karya*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-tag text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Kategori Karya</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan


            @can('publish')
            <li x-data="{ open: {{ Request::is('admin/informasi*') || Request::is('admin/kategori_informasi*') ? 'true' : 'false' }} }" class="mt-0.5 w-full px-2">
                <!-- Bungkus button dalam rounded div -->
                <div class="rounded-lg overflow-hidden">
                    <button @click="open = !open" class="w-full py-2 text-sm ease-nav-brand flex items-center justify-between whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700">
                        <div class="flex items-center">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center text-center xl:p-2.5">
                                <i class="ni ni-single-copy-04	 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            </div>
                            <span class="ml-1">Publish</span>
                        </div>
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown Items -->
                <ul x-show="open" x-transition x-cloak class="ml-6 mt-1 space-y-1">
                    <li>
                        <a href="{{route('admin.informasi.index')}}" class="py-2 text-sm ease-nav-brand flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/informasi*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-notification-70 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.kategori_informasi.index')}}" class="py-2 text-sm ease-nav-brand flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/kategori*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-tag text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            
            @can('manajemen_konten')
            <li x-data="{ open: {{ Request::is('admin/visi*') || Request::is('admin/misi*') || Request::is('admin/alasan*') || Request::is('admin/kontak*') || Request::is('admin/pesan*') || Request::is('admin/frontside*') ? 'true' : 'false' }} }" class="mt-0.5 w-full px-2">
                <div class="rounded-lg overflow-hidden">
                    <button @click="open = !open" class="w-full py-2 text-sm ease-nav-brand flex items-center justify-between whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700">
                        <div class="flex items-center">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center text-center xl:p-2.5">
                                <i class="ni ni-collection text-slate-700 text-sm leading-normal dark:text-white"></i>
                            </div>
                            <span class="ml-1">Manajemen Konten</span>
                        </div>
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Submenu Dropdown -->
                <ul x-show="open" x-transition x-cloak class="ml-6 mt-1 space-y-1">
                    <li>
                        <a href="{{ route('admin.visi.index') }}" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/visi*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-ungroup text-slate-700 text-sm dark:text-white"></i>
                            <span>Visi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.misi.index') }}" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/misi*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-compass-04 text-slate-700 text-sm dark:text-white"></i>
                            <span>Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.alasan_bergabung.index') }}" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/alasan_bergabung*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-chat-round text-slate-700 text-sm dark:text-white"></i>
                            <span>Alasan Bergabung</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kontak.index') }}" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/kontak*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-email-83 text-slate-700 text-sm dark:text-white"></i>
                            <span>Kontak Kami</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/pesan*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-send text-slate-700 text-sm dark:text-white"></i>
                            <span>Pesan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="py-2 text-sm flex items-center gap-2 px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/frontside*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}">
                            <i class="ni ni-world text-slate-700 text-sm dark:text-white"></i>
                            <span>Frontside</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('management-access')

            <li x-data="{ open: {{ Request::is('admin/users*') || Request::is('admin/permissions*') || Request::is('admin/roles*') ? 'true' : 'false' }} }" class="mt-0.5 max-w-full  mx-2">

                <!-- Trigger Dropdown -->
                <button @click="open = !open" class="w-full py-2 text-sm ease-nav-brand my-0 flex items-center justify-between whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg">
                    <div class="flex items-center">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                            <i class="ni ni-lock-circle-open text-slate-700 text-sm leading-normal dark:text-white"></i>
                        </div>
                        <span class="ml-1">Manajemen Akses</span>
                    </div>
                    <!-- Chevron icon -->
                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Items -->
                <ul x-show="open" x-transition x-cloak class="ml-6 mt-1 space-y-1">
                    <li>
                        <a class="py-2 text-sm ease-nav-brand flex items-center gap-2 whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/users*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}"
                            href="{{route('admin.users.index')}}">
                            <i class="ni ni-single-02 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2 text-sm ease-nav-brand flex items-center gap-2 whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/permissions*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}"
                            href="{{route('admin.permissions.index')}}">
                            <i class="ni ni-key-25 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Permission</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2 text-sm ease-nav-brand flex items-center gap-2 whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('admin/roles*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}"
                            href="{{route('admin.roles.index')}}">
                            <i class="ni ni-settings-gear-65 text-slate-700 text-sm leading-normal dark:text-white"></i>
                            <span>Role</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

        </ul>


      </div>

    </aside>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const trigger = document.querySelector('[sidenav-trigger]');
    const sidenav = document.getElementById('sidenav-main');

    trigger.addEventListener('click', function () {
      sidenav.classList.toggle('-translate-x-full');
      sidenav.classList.toggle('translate-x-0');
    });
  });
</script>