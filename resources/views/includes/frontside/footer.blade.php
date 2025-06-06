    <footer class="bg-white">
      <div
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10 pt-16 pb-8 px-5 md:px-20 items-start text-center sm:text-left"
      >
        <!-- Logo dan Sosial Media -->
        <div class="col-span-2 md:col-span-1">
          
        <a href="{{ route('beranda') }}" class="block">
          <div class="flex justify-center sm:justify-start items-center space-x-3 mb-4">
            <img src="{{ asset('assets/frontside/img/icon.svg') }}" class="w-10 h-10" alt="Logo" />
            <h4 class="font-bold text-xs leading-tight">
              MANAJEMEN INFORMATIKA<br />PSDKU PELALAWAN
            </h4>
          </div>
        </a>

          <p class="text-sm mb-2">Social Media:</p>
          <div class="flex justify-center sm:justify-start space-x-3">
            <a
              href="{{ $kontak_kami?->link_fb ?? '#' }}"
              class="w-8 h-8 rounded-sm bg-black text-white flex items-center justify-center"
            >
              <i class="fab fa-facebook-f"></i>
            </a>
            <a
              href="{{ $kontak_kami?->link_website ?? '#' }}"
              class="w-8 h-8 rounded-sm bg-black text-white flex items-center justify-center"
            >
              <i class="fas fa-globe"></i>
            </a>
            <a
              href="{{ $kontak_kami?->link_instagram ?? '#' }}"
              class="w-8 h-8 rounded-sm bg-black text-white flex items-center justify-center"
            >
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>

        <div>
          <h5 class="font-semibold mb-4">Menu</h5>
          <ul class="space-y-2 text-sm text-gray-600">
            <li><a href="{{ route('beranda') }}">Beranda</a></li>
            <li><a href="{{ route('laporan_kepuasan') }}">Laporan Kepuasan</a></li>
            <li><a href="{{ route('karya_mahasiswa') }}">Karya</a></li>
          </ul>
        </div>

        <!-- Learn -->
        <div>
          <h5 class="font-semibold mb-4">Akademik</h5>
          <ul class="space-y-2 text-sm text-gray-600">
            <li><a href="{{ route('kurikulum') }}">Kurikulum</a></li>
            <li><a href="{{ route('akreditasi') }}">Akreditasi</a></li>
            <li><a href="{{ route('kalender_akademik') }}">Kalender Akademik</a></li>
            <li><a href="{{ route('profile_lulusan') }}">Profile Kelulusan</a></li>
          </ul>
        </div>

        <!-- About -->
        <div>
          <h5 class="font-semibold mb-4">Umum</h5>
          <ul class="space-y-2 text-sm text-gray-600">
            <li><a href="{{ route('informasi') }}">Artikel & Berita</a></li>
            <li><a href="{{ route('galeri') }}">Galeri</a></li>
            <li><a href=" {{ route('prestasi_mahasiswa') }}">Prestasi Mahasiswa</a></li>
          </ul>
        </div>

        <!-- Contact Button -->
        <div>
          <h5 class="font-semibold mb-4">Hubungi Kami</h5>
          <div class="flex justify-center sm:justify-start">
           <a href="{{ route('hubungi_kami') }}"
              class="bg-black text-white px-5 py-2 rounded-md hover:opacity-90 transition inline-block">
              Kirim Pesan →
            </a>

          </div>
        </div>
      </div>

      <!-- Footer Bawah -->
      <div
        class="mt-10 border-t pt-5 text-center text-sm text-white bg-[#1A1A1A] py-4"
      >
        @PoliteknikNegeriPadangPSDKUPelalawan
      </div>
    </footer>