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


            @if (\App\Helpers\PermissionHelpers::canAny(['kurikulum', 'dosen', 'modul-perkuliahan', 'kalender-akademik', 'silabus']))

            <li class="mt-3 mb-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider pointer-events-none select-none">
            Perkuliahan
            </li>

            @can('kurikulum')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('kurikulum*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}}" href="/kurikulum">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-book-bookmark text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Kurikulum</span>
                </a>
            </li>
            @endcan

            @can('dosen')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('dosen*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}} " href="/dosen">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-hat-3 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Dosen</span>
                </a>
            </li>
            @endcan

            @can('modul-perkuliahan')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('modul_perkuliahan*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}} " href="/modul_perkuliahan">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-collection text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Modul Perkuliahan</span>
                </a>
            </li>
            @endcan

            @can('silabus')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('silabus*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="/silabus">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-folder-17 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Silabus</span>
                </a>
            </li>
            @endcan

            @can('kalender-akademik')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('kalender_akademik*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/kalender_akademik">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-calendar-grid-58 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Kalender Akademik</span>
                </a>
            </li>
            @endcan
            @endif

           
            @can('management-access')

            <li class="mt-3 mb-1 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider pointer-events-none select-none">
            MANAJEMEN AKSES
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('users*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/users">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-single-02 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">User</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('permissions*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/permissions">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-key-25 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Permission</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('roles*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/roles">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-settings-gear-65 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Role</span>
                </a>
            </li>
            
            @endcan

            

            @if (\App\Helpers\PermissionHelpers::canAny(['deskripsi', 'visi-misi', 'hubungi-kami', 'artikel', 'kategori', 'galeri', 'profile-kelulusan']))
            <li class="mt-3 mb-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider pointer-events-none select-none">
            PAGES
            </li>

            @can('deskripsi')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg  {{ Request::is('deskripsi*') ? 'bg-blue-500/15 font-semibold text-slate-700 rounded-lg' : '' }}" href="/deskripsi">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="ni ni-single-copy-04 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Deskripsi</span>
                </a>
            </li>
            @endcan

            @can('visi-misi')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('visi_misi*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}}" href="/visi_misi">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-world-2 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Visi & Misi</span>
                </a>
            </li>
            @endcan

            @can('hubungi-kami')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{  Request::is('hubungi_kami*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : ''}} " href="/hubungi_kami">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-mobile-button text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Pesan Masuk</span>
                </a>
            </li>
            @endcan

            @can('artikel')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('artikel*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/artikel">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-notification-70 text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Artikel</span>
                </a>
            </li>
            @endcan

            @can('kategori')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('kategori*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/kategori">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-tag text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Kategori</span>
                </a>
            </li>
            @endcan

            @can('galeri')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('galeri*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }} " href="/galeri">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-image text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Galeri</span>
                </a>
            </li>
            @endcan

            @can('profile-kelulusan')
            <li class="mt-0.5 w-full">
                <a class="py-2 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-blue-500/15 hover:font-semibold hover:text-slate-700 hover:rounded-lg {{ Request::is('profile_kelulusan*') ? 'bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="/profile_kelulusan">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
                    <i class="ni ni-badge text-slate-700 text-sm leading-normal dark:text-white"></i>
                </div>
                <span class="ml-1">Profil Kelulusan</span>
                </a>
            </li>
            @endcan
            @endif
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