<!-- Navbar -->
    <header
      id="navbar"
      class="fixed -top-1 left-0 w-full z-50 transition-all duration-300"
    >
      <div class="max-w-7xl mx-auto px-5 md:px-20">
        <div class="flex justify-between items-center py-4">
          <!-- Logo -->
          <a href="{{ route('beranda') }}" class="flex-shrink-0 flex flex-row items-center">
            <img src="{{ asset('assets/frontside/img/logo.png') }}" alt="Logo" class="h-14 w-14" />
            <span class="font-semibold uppercase text-black text-sm"
              >Manajemen Informatika <br />
              PSDKU Pelalawan</span
            >
          </a>

          <!-- Desktop Menu -->
          <nav class="hidden md:flex items-center space-x-8 mx-auto">
            <a
              href="{{  route('beranda') }}"
              class="text-gray-700 text-sm font-normal hover:text-black transition"
              >Beranda</a
            >

            <!-- Dropdown -->
            <div x-data="{ open: false }" class="relative">
              <button
                @click="open = !open"
                class="text-gray-700 text-sm font-normal hover:text-black focus:outline-none flex gap-x-1 items-center"
              >
                Akademik
                <svg
                  class="w-4 h-4 transition-transform duration-300"
                  :class="{ 'rotate-180': open }"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </button>

              <div
                x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute left-0 mt-2 w-52 bg-black shadow-md rounded-md z-10"
              >
                <a
                  href="{{ route('kurikulum') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Kurikulum</a>
                <a
                  href="{{ route('akreditasi') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Akreditasi</a>
                <a
                  href="{{ route('kalender_akademik') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Kalender Akademik</a>
                <a
                  href="{{ route('profile_lulusan') }}"
                  class="block px-4 py-2 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Profil Kelulusan</a>
              </div>
            </div>

            <a
              href="{{ route('laporan_kepuasan') }}"
              class="text-gray-700 text-sm font-normal hover:text-black transition"
              >Laporan Kepuasan</a
            >

            <a
              href="{{ route('karya_mahasiswa') }}"
              class="text-gray-700 text-sm font-normal hover:text-black transition"
              >Karya</a
            >

            <!-- Dropdown -->
            <div x-data="{ open: false }" class="relative">
              <button
                @click="open = !open"
                class="text-gray-700 text-sm font-normal hover:text-black focus:outline-none flex gap-x-1 items-center"
              >
                Umum

                <svg
                  class="w-4 h-4 transition-transform duration-300"
                  :class="{ 'rotate-180': open }"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </button>

              <div
                x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute left-0 mt-2 w-52 bg-black shadow-md rounded-md z-10"
              >
                <a
                  href="{{ route('informasi') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Berita & Artikel</a>
                <a
                  href="{{ route('galeri') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Galeri</a>
                <a
                  href="{{ route('prestasi_mahasiswa') }}"
                  class="block px-4 py-2 mb-1 text-sm text-white hover:bg-gray-700 rounded transition-colors duration-300"
                >Prestasi Mahasiswa</a>
              </div>
            </div>
          </nav>

          <a href="{{ route('hubungi_kami') }}"
            class="bg-black hidden md:block text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition">
            Hubungi Kami
          </a>


          <!-- Hamburger Menu -->
          <div class="md:hidden flex items-center">
            <button id="menu-btn" class="focus:outline-none">
              <svg
                class="w-6 h-6 text-black"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div
        id="mobile-menu"
        class="md:hidden hidden bg-white px-4 pb-4 space-y-2"
      >
        <a
          href="{{  route('beranda') }}"
          class="block py-2 text-sm font-normal text-gray-700 hover:text-black"
          >Beranda</a
        >

        <div>
          <!-- Tombol Akademik (dengan ikon) -->
          <button
            id="toggle-akademik"
            class="w-full flex justify-between items-center py-2 text-sm font-normal text-gray-700 hover:text-black"
          >
            <span>Akademik</span>
            <svg
              id="icon-akademik"
              class="w-4 h-4 transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>

          <!-- Submenu Akademik -->
          <div
            id="submenu-akademik"
            class="pl-4 space-y-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out"
          >
            <a href="{{  route('kurikulum') }}" class="block text-sm text-gray-700 hover:text-black"
              >Kurikulum</a
            >
            <a href="{{  route('akreditasi') }}" class="block text-sm text-gray-700 hover:text-black"
              >Akreditasi</a
            >
            <a href="{{  route('kalender_akademik') }}" class="block text-sm text-gray-700 hover:text-black"
              >Kalender Akademik</a
            >
            <a href="{{  route('profile_lulusan') }}" class="block text-sm text-gray-700 hover:text-black"
              >Profil Kelulusan</a
            >
          </div>
        </div>

        <a
          href="{{  route('laporan_kepuasan') }}"
          class="block py-2 text-sm font-normal text-gray-700 hover:text-black"
          >Laporan Kepuasan</a
        >

        <a
          href="{{  route('karya_mahasiswa') }}"
          class="block py-2 text-sm font-normal text-gray-700 hover:text-black"
          >Karya</a
        >

                <div>
          <!-- Tombol Akademik (dengan ikon) -->
          <button 
            id="toggle-umum"
            class="w-full flex justify-between items-center py-2 text-sm font-normal text-gray-700 hover:text-black"
          >
            <span>Umum</span>
            <svg
              id="icon-umum"
              class="w-4 h-4 transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>

          <!-- Submenu umum -->
          <div
            id="submenu-umum"
            class="pl-4 space-y-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out"
          >
            <a href="{{  route('informasi') }}" class="block text-sm text-gray-700 hover:text-black"
              >Artikel & Berita</a
            >
            <a href="{{  route('galeri') }}" class="block text-sm text-gray-700 hover:text-black"
              >Galeri</a
            >
            <a href="{{  route('prestasi_mahasiswa') }}" class="block text-sm text-gray-700 hover:text-black"
              >Prestasi Mahasiswa</a
            >
          </div>

          <a href="{{ route('hubungi_kami') }}"
            class="w-full bg-black text-white px-4 py-2 rounded-md text-sm hover:opacity-90 text-center block">
            Hubungi Kami
          </a>

      </div>
    </header>