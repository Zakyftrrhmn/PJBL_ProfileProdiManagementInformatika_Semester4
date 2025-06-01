    
    <div id="transition-overlay"
        class="fixed top-0 left-0 w-full h-full z-[9999] pointer-events-none opacity-0 scale-95 rotate-0 bg-blue-500 transition-all duration-700 ease-in-out transform origin-center flex items-center justify-center text-white text-center active">
        
    <div class="flex flex-col items-center space-y-2 animate-fade-in">
        <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Logo" class="w-20 h-20 animate-pulse">
        <div class="text-2xl font-bold tracking-wid uppercase">Manajemen Informatika</div>
        <div class="text-lg  font-bold tracking-wide uppercase">PSDKU Pelalawan</div>
        <div class="mt-4">
        <svg class="w-6 h-6 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 018 8z"></path>
        </svg>
        </div>
    </div>
    </div>

    <style>
     #transition-overlay {
        transform: translateY(-100%);
        opacity: 0;
        pointer-events: none;
        transition:
          transform 0.7s ease-in-out,
          opacity 0.2s ease-in 0.5s; /* delay opacity biar naiknya halus */
      }

      #transition-overlay.active {
        pointer-events: auto;
        transform: translateY(0);
        opacity: 1;
        transition:
          transform 0.7s ease-in-out,
          opacity 0.2s ease-in;
      }

      #transition-overlay.hide {
        transform: translateY(-100%);
        opacity: 0;
        pointer-events: none;
        transition:
          transform 0.7s ease-in-out,
          opacity 0.2s ease-in 0.4s; /* delay opacity pas naik biar animasi selesai dulu */
      }


    </style>