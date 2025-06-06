@include('includes.frontside.header')
    
  <body class="font-['Inter']">

    @include('includes.frontside.navbar')

      @yield('content')

    @include('includes.frontside.footer')

    @include('includes.frontside.scripts')
    
    @vite('resources/js/app.js')
  </body>
</html>
