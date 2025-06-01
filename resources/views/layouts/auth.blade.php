<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="{{asset('assets/css/argon-dashboard-tailwind.css?v=1')}}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <link rel="icon" type="image/png" href="{{asset('assets/img/logo.png')}}"/>

</head>
<body class="bg-slate-50 text-slate-800 antialiased ">

    @yield('content')

    @vite('resources/js/app.js')
</body>
</html>
