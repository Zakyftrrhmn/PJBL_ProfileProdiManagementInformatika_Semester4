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
    
    <link rel="icon" type="image/png" href="{{asset('assets/img/icon.svg')}}"/>
    <!-- Google Fonts: Rubik & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">


</head>
<body class="min-h-screen flex items-center justify-center bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('assets/img/bgloginn.png') }}');">

    @yield('content')

    @vite('resources/js/app.js')
</body>
</html>
