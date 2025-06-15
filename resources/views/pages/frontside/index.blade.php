@extends('layouts.frontside')
@section('title', 'Manajemen Informatika PSDKU Pelalawan')
@section('content')
    
    @if($frontside)
    <!-- Hero Section -->
    <section class="mt-20 mx-3 md:mx-5 rounded-xl overflow-hidden h-[600px] md:h-[745px] px-5 flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('assets/frontside/img/background.png ') }}')"
    >
        <!-- Konten -->
        <div class="z-10 text-center max-w-4xl mx-auto">
          <!-- Marquee / Welcome Text -->
          <div
            class="rotating-border w-[180px] sm:w-[250px] md:w-[320px] mx-auto mb-6 px-4 py-2"
          >
            <p class="marquee text-white text-xs sm:text-sm">
              <span>
                {{ $heroTitle = $frontside ? $frontside->hero_title : 'Selamat datang di website Prodi D3 Manajemen Informatika PSDKU Pelalawan ✨'; }}
              </span>
            </p>
          </div>

          <!-- Judul Utama -->
          <h1
            class="text-white text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-bold font-[Rubik] leading-tight mb-4"
          >
            {!! $heroSubtitle = $frontside ? $frontside->hero_subtitle : 'MANAJEMEN INFORMATIKA <br /> PNP PSDKU PELALAWAN'; !!}
          </h1>

          <!-- Deskripsi -->
          <p
            class="text-[#cbd5e1] font-inter mb-8 text-sm sm:text-base md:text-lg max-w-2xl mx-auto"
          >
            {{ $heroDescription = $frontside ? $frontside->hero_description : '240+ mahasiswa aktif di Prodi Manajemen Informatika PNP Pelalawan siap bersaing di dunia digital.'; }}
          </p>

          <!-- Tombol CTA -->
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a
              href="#"
              class="bg-white text-black font-medium px-6 py-3 rounded-md hover:bg-gray-200 transition text-sm sm:text-base"
            >
              Get Started →
            </a>
            <a
              href="{{  route('kurikulum') }}"
              class="bg-[#202020] text-white font-medium px-6 py-3 rounded-md hover:opacity-90 transition text-sm sm:text-base"
            >
              Lihat Kurikulum
            </a>
          </div>
        </div>

    </section>

      <!-- Hello Section -->
    <section class="bg-white py-24 px-3 md:px-5 text-center font-inter">
        <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
          {{ $frontside ? $frontside->intro_title : 'Selamat Datang di Manajemen Informatika PSDKU Pelalawan'; }}
        </h2>
        <p class="text-gray-700 md:text-2xl leading-relaxed max-w-4xl mx-auto">
          {!! $frontside ? $frontside->intro_description : '        Selamat datang di website Prodi kami! Yuk, jelajahi serunya dunia kampus
          dan jurusan kita di sini.
          <strong class="text-black font-semibold"
            >Jangan lupa kasih feedback, ya!</strong
          >
          Terima kasih! ❤️'; !!}
        </p>
    </section>


    <!-- Visi Misi -->

    <section class="bg-[#F6F8FD] w-full py-16">
      <div
        class="max-w-7xl mx-auto px-5 md:px-10 flex flex-col md:flex-row items-center gap-10"
      >
        <!-- Text Side -->
        <div class="w-full md:w-1/2">
          <span
            class="uppercase text-[8px]  md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
          >
            {{ $frontside ? $frontside->visi_misi_title : 'Visi & Misi Kami'; }}
          </span>

          <div class="flex flex-col mt-4">
            <h2
              class="text-3xl md:text-4xl font-bold font-['Rubik'] text-gray-900 mt-2"
            >
              {{ $frontside ? $frontside->visi_misi_subtitle : 'Menjadi Inspirasi Masa Depan Lewat Pendidikan Vokasional'; }}
            </h2>
            <p class="text-[#838AA7] mt-1">
              {{ $frontside ? $frontside->visi_misi_description : 'Kenali visi & misi kami untuk tahu ke mana langkah kami menuju!'; }}
            </p>
          </div>

          <!-- Accordion Visi & Misi -->
          <div
            x-data="{ openVisi: true, openMisi: false }"
            class="mt-6 space-y-4"
          >
            <!-- VISI -->
            <div class="bg-white rounded-xl shadow p-4">
              <button
                @click="openVisi = !openVisi"
                class="flex justify-between items-center w-full"
              >
                <span class="font-semibold">Visi Kami</span>
                <div
                  class="w-6 h-6 bg-black text-white rounded-full flex items-center justify-center"
                >
                  <svg
                    :class="{'rotate-180': openVisi}"
                    class="transition-transform w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </button>
              <div
                x-show="openVisi"
                x-transition
                class="mt-3 text-sm text-gray-700"
              >
                @if($visi)
                  {{ $visi ? $visi->visi : 'Misi Prodi';}}
                @endif
              </div>
            </div>

            <!-- MISI -->
            <div class="bg-white rounded-xl shadow p-4">
              <button
                @click="openMisi = !openMisi"
                class="flex justify-between items-center w-full"
              >
                <span class="font-semibold">Misi Kami</span>
                <div
                  class="w-6 h-6 bg-black text-white rounded-full flex items-center justify-center"
                >
                  <svg
                    :class="{'rotate-180': openMisi}"
                    class="transition-transform w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </button>
              <div
                x-show="openMisi"
                x-transition
                class="mt-3 text-sm text-gray-700"
              >
                <ul class="list-disc pl-4 space-y-1">
                  @foreach ($misi as $m)
                      <li>{{ $m->misi }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Side -->
        <div class="w-full md:w-1/2">
          <div class="bg-[#DDE0FD] p-4 rounded-2xl">
            <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden">
              <video
                autoplay
                loop
                muted
                playsinline
                class="w-full h-full object-cover rounded-xl"
              >
              <source
                src="{{ $frontside->visi_misi_video_url ? asset('storage/' . $frontside->visi_misi_video_url) : asset('assets/frontside/video/visi_misi.mp4') }}"
                type="video/mp4"
              />
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <!-- Kenapa -->
    <section class="py-12 px-4">
      <div
        class="max-w-7xl mx-auto px-5 md:px-10 flex flex-col md:flex-row items-center gap-10"
      >
        <!-- Video Placeholder (Ganti dengan video nyata jika ada) -->
        <div class="rounded-xl overflow-hidden shadow-lg w-full md:w-1/2">
          <video
            autoplay
            loop
            muted
            playsinline
            class="w-full h-full object-cover rounded-xl"
          >
            <source
              src="{{ $frontside->why_join_video_url ? asset('storage/' . $frontside->why_join_video_url) : asset('assets/frontside/video/jurusan.mp4') }}"
              type="video/mp4"
            />
            Your browser does not support the video tag.
          </video>
        </div>

        <!-- Konten Text -->
        <div class="w-full md:w-1/2">
          <span
            class="uppercase text-[8px] md:text-sm font-semibold text-green-600 bg-green-200 px-3 py-1 rounded-full tracking-widest"
            >{{ $frontside ? $frontside->why_join_title : 'Kenapa Manajemen Informatika PSDKU Pelalawan?'; }}</span
          >
          <h2
            class="text-3xl md:text-4xl font-bold font-['Rubik'] text-gray-900 mt-2"
          >
            {!! $frontside ? $frontside->why_join_description : 'Masuk sebagai Mahasiswa, <br />
            Keluar sebagai Developer'; !!}
          </h2>

          <ul class="mt-6 space-y-2 text-gray-700">
            @foreach ($alasan_bergabung as $ab)
                
            <li class="flex items-start gap-3">
              <span class="w-8 h-8"
                ><img src="{{ asset('assets/frontside/img/success.png') }}" alt=""
              /></span>
              {{ $ab->alasan }}
            </li>

            @endforeach
          </ul>
        </div>
      </div>
    </section>



    <!-- proyek -->
    <section class="w-full bg-[#F6F8FD] py-16 px-4">
      <div class="max-w-7xl mx-auto px-5 md:px-10 text-center">
        <!-- Subtitle -->
        <span
          class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
        >
          {{ $frontside ? $frontside->karya_title : 'KARYA ANAK MANAJEMEN INFORMATIKA PSDKU PELALAWAN'; }}
        </span>

        <!-- Title -->
        <h2
          class="text-3xl md:text-4xl font-bold font-['Rubik'] text-gray-900 mt-2"
        >
          {{ $frontside ? $frontside->karya_subtitle : 'Karya Nyata, Bukan Cuma Tugas Kuliah!'; }}
        </h2>

        <!-- Description -->
        <p class="text-[#838AA7] mt-1 text-base">
          {{ $frontside ? $frontside->karya_description : 'Lihat hasil seru dari ide-ide mahasiswa: IoT, Web, dan Mobile siap tampil!'; }}
        </p>

        <!-- Cek apakah ada data karya mahasiswa -->
        @if ($karya_mahasiswa->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Karya Mahasiswa Belum Ada
              </p>
            </div>

        @else
            <!-- Grid Container -->
            <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              
              @foreach ($karya_mahasiswa->take(4) as $km)
                  <a href="{{ route('karya_mahasiswa.detail', $km->slug) }}" class="block">
                      <div class="bg-white rounded-[10px] overflow-hidden shadow-sm mx-auto w-full">
                          <img
                              src="{{ $km->thumbnail ? asset('storage/' . $km->thumbnail) : asset('assets/frontside/img/karya.png') }}"
                              alt="{{ $km->judul }}"
                              class="w-full h-48 object-cover rounded-t-[10px]"
                          />
                          <div class="p-4">
                              <p class="font-['Inter'] text-[16px] md:text-[18px] text-gray-900 leading-snug text-start line-clamp-2">
                                  {{ $km->judul }}
                              </p>
                              <p class="font-['Inter'] text-[12px] md:text-[14px] tracking-[0.1em] text-green-600 mt-1 uppercase text-start">
                                  {{ $km->kategori_karya->nama_kategori }}
                              </p>
                          </div>
                      </div>
                  </a>
              @endforeach

            </div>

            <!-- View More Button -->
            <a href="{{ route('karya_mahasiswa') }}" 
            class="mt-10 inline-block bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition">
            View More
          </a>

        @endif

      </div>
    </section>



    <!-- Banner -->
    <section class="w-full px-5 md:px-20 py-16 bg-white relative z-0">
      <div class="max-w-6xl mx-auto">
        <img
          src="{{ $frontside->banner ? asset('storage/' . $frontside->banner) : asset('assets/frontside/img/est.png') }}"
          alt="Gambar Edukasi Teknologi"
          class="w-full h-auto object-contain max-w-4xl max-h-[321px] mx-auto"
        />
      </div>
    </section>

    <!-- Slider Section -->
    <section class="bg-[#202020] py-20 -mt-20 relative z-10">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <span
          class="uppercase text-[8px] md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
        >
          {{ $frontside ? $frontside->dosen_title : 'Tenaga pengajar berpengalaman'; }}
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-white mt-2">
          {{ $frontside ? $frontside->dosen_subtitle : 'Profil Dosen Pengajar'; }}
        </h2>
        <p class="text-[#838AA7] mt-1 text-base">
          {{ $frontside ? $frontside->dosen_description : 'Lihat profil singkat para dosen.'; }}
        </p>
      </div>

      <div class="swiper mt-10 px-4">
         @if ($dosen->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Data Dosen Belum Ada
              </p>
            </div>
        @else
        <div class="swiper-wrapper">
          <!-- Swiper Container -->
          <!-- Swiper Slide -->
          @foreach ($dosen as $d)
          <div class="swiper-slide">
            <!-- Card isi dosen seperti sebelumnya -->
            <div
              class="bg-white rounded-xl shadow-md p-4 text-black min-w-[300px] max-w-xs mx-auto"
            >
              <div class="flex flex-col items-center">
                <div
                  class="w-full h-24  bg-cover bg-center rounded-lg mb-[-30px]" style="background-image: url('{{ asset('assets/frontside/img/abstrak.jpg') }}');"
                ></div>
                <img
                  src="{{ asset('storage/dosen/' . $d->photo) }}"
                  alt="photo dosen"
                  class="w-24 h-24 rounded-full border-4 border-white object-cover"
                />
                <p class="text-sm text-[#838AA7] mt-2">{{ $d->username }}</p>
                <h3 class="font-semibold text-lg">{{ $d->nama }}</h3>
                <p class="text-xs text-[#838AA7] uppercase font-medium">
                  {{ $d->asal_kota }} | NIDN {{ $d->nidn }}
                </p>
              </div>
              <hr class="my-4 text-[#838AA7]" />
              <div class="space-y-2 text-sm">
                <div class="flex justify-between text-xs">
                  <span class="flex items-center text-[#838AA7]"
                    ><i class="fas fa-globe mr-2"></i> Website</span
                  >
                  <span class="text-right">{{ $d->website }}</span>
                </div>
                <div class="flex justify-between text-xs">
                  <span class="flex items-center text-[#838AA7]"
                    ><i class="fas fa-envelope mr-2"></i> Email</span
                  >
                  <span class="text-right">  {{ $d->email }} </span>
                </div>
                <div class="flex justify-between text-xs">
                  <span class="flex items-center text-[#838AA7]"
                    ><i class="fas fa-graduation-cap mr-2"></i> Pendidikan</span
                  >
                  <span class="text-right">{{ $d->pendidikan }}</span>
                </div>
                <div class="flex justify-between text-xs">
                  <span class="flex items-center text-[#838AA7]"
                    ><i class="fas fa-briefcase mr-2"></i> Jabatan</span
                  >
                  <span class="text-right">{{ $d->jabatan }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Tambahkan slide lain sesuai kebutuhan -->
        </div>
        <!-- Optional Navigation -->
        <div class="swiper-button-prev text-white"></div>
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-pagination mt-4"></div>
        
        @endif
      </div>
    </section>


    <!-- Berita & Artikel -->
    <section class="w-full px-5 md:px-20 py-16 bg-white">
      <!-- Label -->
      <span
        class="uppercase text-[8px]  md:text-xs font-semibold text-blue-700 bg-blue-200 px-3 py-1 rounded-full tracking-widest"
      >
        {{ $frontside ? $frontside->information_title : 'ARTIKEL & BERITA'; }}
      </span>

      <!-- Judul & Tombol -->
      <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mt-6">
        <div>
          <h2 class="text-2xl md:text-4xl font-bold text-black font-['Rubik']">
        {{ $frontside ? $frontside->information_subtitle : 'Berita & Artikel Terkini'; }}
          </h2>
          <p class="text-[#838AA7] mt-2 text-sm md:text-base max-w-xl">
        {{ $frontside ? $frontside->information_description : 'Update terbaru seputar kegiatan, prestasi, dan informasi penting dari Manajemen Informatika PSDKU Pelalawan.'; }}
          </p>
        </div>
        <a href="{{ route('informasi') }}"
          class="bg-black text-white px-4 py-2 rounded-md text-sm hover:opacity-90 transition w-full md:w-auto text-center block">
          View More
        </a>

      </div>
      @if ($informasi->isEmpty())
           <div class="mt-10 flex justify-center">
              <p class="text-center text-sm px-6 py-2 rounded-full text-red-700 bg-red-200">
                Informasi Belum Ada
              </p>
            </div>
        @else
      <!-- Kartu Artikel -->
      <div id="artikelWrapper" class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      @foreach ($informasi as $i)
        <a href="{{ route('informasi.detail', $i->slug) }}" class="block">
          <div class="bg-white rounded-2xl overflow-hidden shadow-md transition hover:shadow-lg">
            <!-- Gambar -->
            <img
              src="{{ $i->thumbnail ? asset('storage/' . $i->thumbnail) : asset('assets/frontside/img/naruto.jpg') }}"
              alt="Artikel"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <!-- Konten -->
            <div class="p-4 bg-white relative">
              <h3 class="text-base font-semibold text-black mb-2 leading-snug line-clamp-2">
                {{ $i->judul }}
              </h3>
              <div class="text-xs text-[#838AA7] mb-3">
                {{ $i->created_at->diffForHumans() }} <span class="mx-1">•</span>
                <span class="underline text-green-500">{{ $i->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
              </div>
              <div class="flex justify-between items-center">
                <div class="flex items-center space-x-1 text-sm text-[#838AA7]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                    <span class="text-xs md:text-md">{{ $i->user->name ?? 'Unknown' }}</span>
                  </div>

                <div class="text-white text-center">
                  <svg
                    class="w-5 h-5 rounded-full bg-black"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </a>
      @endforeach


      </div>
      @endif
    </section>

    <!-- Seksi Ajak Kunjungi Website -->
    <section class="w-full px-5 md:px-20 py-16">
      <div
        class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 px-6 md:px-12 lg:px-20 py-12 bg-black rounded-2xl"
      >
        <!-- Text -->
        <div class="text-white max-w-2xl">
          <h2 class="text-2xl sm:text-3xl font-bold font-[Rubik] leading-snug">
          {{ $frontside ? $frontside->penutup_title : 'Penasaran dengan kampus kami?'; }}
          </h2>
          <p class="text-[#E5E7EB] mt-2 text-base leading-relaxed">
        {{ $frontside ? $frontside->penutup_description : 'Yuk, cari tahu lebih banyak tentang program studi, kegiatan seru, dan kehidupan mahasiswa di Politeknik Negeri Padang!'; }}
          </p>
        </div>

        <!-- Tombol -->
        <div class="w-full sm:w-auto">
          <a
            href="https://www.pnp.ac.id"
            target="_blank"
            class="block text-center bg-[#F3E8FF] font-semibold text-black px-6 py-3 rounded-md text-sm hover:opacity-90 transition"
          >
            Kunjungi Website PNP
          </a>
        </div>
      </div>
    </section>
    @endif

@endsection