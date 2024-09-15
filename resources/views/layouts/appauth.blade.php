<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    @stack('styles')
    
    <title>Document</title>
</head>

<body>
    <style type="text/css">
        @font-face {
            font-family: /fonts/Gotham-Light;
            src: url('{{ public_path('fonts/Muli-Bold.tff') }}');
        }
    </style>
    @include('layouts.navbarauth')

    <div>
        @yield('content')
        
    </div>
    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body> 

</html>
