    <!-- Include Alpine.js -->
    <script
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
      defer
    ></script>

      <!-- AI Assistant Avatar -->
      <a href="{{ $kontak_kami->link_wa ?? '#' }}" target="_blank" class="fixed bottom-6 right-6 z-50 flex items-end space-x-3 animate-fade-in">
        <!-- Chat Bubble -->
        <div
          class="bg-white text-sm px-4 py-2 rounded-lg shadow-lg max-w-[200px] text-gray-800 relative animate-typing"
        >
          <span class="block">💬 Siap Jadi Mahasiswa? Hubungi Kami Sekarang!</span>
          <span
            class="absolute bottom-[-10px] left-4 w-0 h-0 border-t-[10px] border-t-white border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent"
          ></span>
        </div>

        <!-- Avatar Bot -->
        <div
          class="w-10 h-10 rounded-full bg-gradient-to-tr from-green-500 to-green-700 flex items-center justify-center text-white shadow-lg border border-white animate-pulse"
        >
          <img src="{{ asset('assets/frontside/img/wa.svg') }}" alt="" class="w-12 h-12" />
        </div>
      </a>


    <script>
      // Toggle mobile menu
      document.getElementById("menu-btn").addEventListener("click", () => {
        const menu = document.getElementById("mobile-menu");
        menu.classList.toggle("hidden");
      });

      // Change navbar background on scroll
      window.addEventListener("scroll", () => {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 10) {
          navbar.classList.add("navbar-scrolled");
        } else {
          navbar.classList.remove("navbar-scrolled");
        }
      });
    </script>

    <script>
      const toggleBtn = document.getElementById("toggle-akademik");
      const submenu = document.getElementById("submenu-akademik");
      const icon = document.getElementById("icon-akademik");

      let isOpen = false;

      toggleBtn.addEventListener("click", () => {
        isOpen = !isOpen;

        if (isOpen) {
          submenu.classList.remove("max-h-0");
          submenu.classList.add("max-h-96"); // Adjust height as needed
          icon.classList.add("rotate-180");
        } else {
          submenu.classList.remove("max-h-96");
          submenu.classList.add("max-h-0");
          icon.classList.remove("rotate-180");
        }
      });
    </script>

     <script>
      const toggleBtnn = document.getElementById("toggle-umum");
      const submenuu = document.getElementById("submenu-umum");
      const iconn = document.getElementById("icon-umum");

      let isOpenn = false;

      toggleBtnn.addEventListener("click", () => {
        isOpenn = !isOpenn;

        if (isOpenn) {
          submenuu.classList.remove("max-h-0");
          submenuu.classList.add("max-h-96"); // Adjust height as needed
          iconn.classList.add("rotate-180");
        } else {
          submenuu.classList.remove("max-h-96");
          submenuu.classList.add("max-h-0");
          iconn.classList.remove("rotate-180");
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

 <script>
  const swiper = new Swiper(".swiper", {
    loop: true,
    spaceBetween: 20,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    // Default (mobile first)
    slidesPerView: 1.2,
    centeredSlides: true,

    // Breakpoints untuk override di ukuran lebih besar
    breakpoints: {
      640: {
        slidesPerView: 2,
        centeredSlides: false,
      },
      1024: {
        slidesPerView: 3,
        centeredSlides: false,
      },
    },
  });
</script>


    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const artikelItems = document.querySelectorAll(
          "#artikelWrapper > div.bg-white"
        );

        // Sembunyikan semua kartu di atas indeks ke-3 (mulai dari index ke-4 = item ke-5)
        artikelItems.forEach((item, index) => {
          if (index >= 4) {
            item.classList.add("hidden");
          }
        });
      });
    </script>