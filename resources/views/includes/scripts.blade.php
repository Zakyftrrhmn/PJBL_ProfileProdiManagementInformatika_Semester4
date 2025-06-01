
  @vite('resources/js/app.js')
  <!-- plugin for scrollbar  -->

  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" defer></script>
  <!-- main script file  -->
  <script src="{{asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" defer></script>
  <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>

  <script>
    document.querySelectorAll('a').forEach(link => {
      if (
        link.hostname === window.location.hostname &&
        link.getAttribute('target') !== '_blank' &&
        link.getAttribute('href') &&
        link.getAttribute('href') !== '#' &&
        !link.getAttribute('href').startsWith('javascript:')
      ) {
        link.addEventListener('click', function (e) {
          const overlay = document.getElementById('transition-overlay');
          const href = this.getAttribute('href');
          if (!overlay) return;

          e.preventDefault();

          // Simpan flag ke sessionStorage
          sessionStorage.setItem('triggerOverlayOpen', 'true');

          // Aktifkan animasi tutup
          overlay.classList.add('active');
          overlay.classList.remove('hide');

          // Setelah animasi selesai, pindah halaman
          setTimeout(() => {
            window.location.href = href;
          }, 700); // sesuaikan dengan CSS
        });
      }
    });
  </script>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const overlay = document.getElementById('transition-overlay');

      if (sessionStorage.getItem('triggerOverlayOpen') === 'true') {
        // Biarkan overlay tetap aktif dulu, lalu hapus setelah beberapa saat
        setTimeout(() => {
          overlay.classList.remove('active');
          overlay.classList.add('hide');

          // Hapus flag biar nggak ke-trigger terus
          sessionStorage.removeItem('triggerOverlayOpen');
        }, 300); // waktu delay sebelum tirai "naik" (bisa disesuaikan)
      } else {
        // Kalau tidak ada flag, langsung sembunyikan overlay
        overlay.classList.remove('active');
        overlay.classList.add('hide');
      }
    });
  </script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

  <script src="//unpkg.com/alpinejs" defer></script>

