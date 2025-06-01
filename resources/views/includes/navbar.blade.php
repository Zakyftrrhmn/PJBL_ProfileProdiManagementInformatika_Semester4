<nav
  class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
  navbar-main
  navbar-scroll="false"
>
  <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
    
    <!-- BREADCRUMB SECTION (Hidden on mobile) -->
    <nav class="hidden sm:block">
      <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        <li class="text-sm leading-normal">
          <a class="text-white opacity-50" href="javascript:;">Pages</a>
        </li>
        <li
          class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
          aria-current="page"
        >
          Tables
        </li>
      </ol>
      <h6 class="mb-0 font-bold text-white capitalize">Tables</h6>
    </nav>

    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
      <div class="flex items-center md:ml-auto md:pr-4">
        <!-- Empty container -->
      </div>

      <ul class="flex flex-row justify-end pl-0 mb-0 list-none w-full lg:w-auto">
        
        <li class="flex items-center">
          @auth
          <div class="relative inline-block text-left">
            <button
              id="userMenuButton"
              type="button"
              class="inline-flex items-center px-4 py-2 text-sm font-medium text-white"
              onclick="toggleDropdown()"
            >
              <i class="fa fa-user mr-2"></i>
              {{ Auth::user()->name }}
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div id="userDropdown" class="hidden absolute right-0 z-10 mt-2 w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="userMenuButton">
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  role="menuitem"
                >
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  @csrf
                </form>
              </div>
            </div>
          </div>

          <script>
            function toggleDropdown() {
              const dropdown = document.getElementById('userDropdown');
              dropdown.classList.toggle('hidden');
            }

            document.addEventListener('click', function (e) {
              const button = document.getElementById('userMenuButton');
              const dropdown = document.getElementById('userDropdown');
              if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
              }
            });
          </script>

          @else
          <a
            href="{{ route('login') }}"
            class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand"
          >
            <i class="fa fa-user sm:mr-1"></i>
            <span class="hidden sm:inline">Sign In</span>
          </a>
          @endauth
        </li>

        <!-- Sidenav Trigger (Visible on small screens only) -->
        <li class="flex items-center pl-4 xl:hidden">
          <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
            <div class="w-4.5 overflow-hidden">
              <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
              <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
              <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
