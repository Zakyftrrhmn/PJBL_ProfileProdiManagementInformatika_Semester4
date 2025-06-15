<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-3 mx-6 mt-4 transition-all ease-in duration-250  lg:flex-nowrap lg:justify-start dark:shadow-none"
    navbar-main
    navbar-scroll="false"
>
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

        <nav class="hidden sm:block">
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white text-opacity-80 hover:text-opacity-100 transition-all" href="javascript:;">Pages</a>
                </li>
                <li
                    class="text-sm pl-2 capitalize leading-normal text-white font-semibold before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page"
                >
                    @yield('title')
                </li>
            </ol>
            <h6 class="mb-0 font-extrabold text-white capitalize text-lg">@yield('title')</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                </div>

            <ul class="flex flex-row justify-end pl-0 mb-0 list-none w-full lg:w-auto">

                <li class="flex items-center">
                    @auth
                    <div class="relative inline-block text-left" x-data="{ open: false }" @click.outside="open = false">
                        <button
                            id="userMenuButton"
                            type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white hover:bg-white hover:bg-opacity-20 rounded-md transition-colors"
                            @click="open = !open"
                        >
                            <i class="fa fa-user mr-2 text-white"></i>
                            <span class="hidden md:inline-block">{{ Auth::user()->name }}</span>
                            <svg :class="{'rotate-180': open}" class="ml-2 w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 z-10 mt-2 w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-slate-700 dark:ring-white dark:ring-opacity-10">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="userMenuButton">
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-slate-600"
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

                    @else
                    <a
                        href="{{ route('login') }}"
                        class="block px-4 py-2 text-sm font-semibold text-white transition-all ease-nav-brand hover:bg-white hover:bg-opacity-20 rounded-md"
                    >
                        <i class="fa fa-user mr-2 sm:mr-1"></i>
                        <span class="hidden sm:inline">Sign In</span>
                    </a>
                    @endauth
                </li>

                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand hover:text-opacity-80" sidenav-trigger>
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