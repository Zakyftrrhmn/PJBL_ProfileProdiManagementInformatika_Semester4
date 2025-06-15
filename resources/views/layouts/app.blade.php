@include('includes.header')

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    @include('includes.loading')



    <div class="fixed w-full bg-[#5E72E2] -mt-6 dark:hidden min-h-75"></div>

    @include('includes.sidebar')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

      @include('includes.navbar')

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        @yield('content')

        @include('includes.footer')
      </div>
    </main>

    @include('includes.delete-modal')
    
    @include('includes.scripts')

    @stack('scripts')

  </body>

</html>

