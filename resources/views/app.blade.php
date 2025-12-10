<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Naterra')</title>
    <link rel="stylesheet" href="{{ asset('static/main.css') }}">
    @yield('extra-css')
</head>
<body class="{{ $bodyClass ?? 'body_mapa' }}">

    <!-- LOGO (posición dinámica según la página) -->
    <img src="{{ asset('static/img/logo.svg') }}" alt="Naterra" class="logo" style="{{ $logoStyle ?? '' }}">

    <!-- FONDO AUSTRALIA -->
    <div class="australia">
        <img src="{{ asset('static/img/Australia_satellite_plane.jpg') }}" alt="Australia">
    </div>

    <!-- ASTRONAUTA (solo en el mapa principal) -->
    @if(isset($showAstronaut) && $showAstronaut)
        <img src="{{ asset('static/img/astronauta.png') }}" alt="Astronauta" class="astronaut">
    @endif

    <!-- SIDEBAR / NAVBAR -->
    <div class="sidebar">
        <div class="nav-btn"><a href="{{ route('home') }}"><img src="{{ asset('static/img/homepage.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('perfil') }}"><img src="{{ asset('static/img/perfil.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('ranking') }}"><img src="{{ asset('static/img/ranking.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('repaso') }}"><img src="{{ asset('static/img/repas.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('config') }}"><img src="{{ asset('static/img/configuracio.png') }}"></a></div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="{{ asset('funcionalidades.js') }}"></script>
    @yield('scripts')
</body>
</html>