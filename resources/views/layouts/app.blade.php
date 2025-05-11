@include('includes.header')

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    @include('includes.sidebar')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      @include('includes.navbar')

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        @yield('content')

        @include('includes.footer')
      </div>
    </main>

@include('includes.scripts')
@stack('scripts')

