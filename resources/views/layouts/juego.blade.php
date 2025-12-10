<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Naterra')</title>
    <link rel="stylesheet" href="{{ asset('static/main.css') }}">
    @yield('extra-css')
</head>
<body class="body_mapa">

    <!-- LOGO (posición fija como en tus preguntas) -->
    <img src="{{ asset('static/img/logo.svg') }}" alt="Naterra" class="logo" style="left: 770px; top: 0px;">

    <!-- FONDO AUSTRALIA -->
    <div class="australia">
        <img src="{{ asset('static/img/Australia_satellite_plane.jpg') }}" alt="Australia">
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="nav-btn"><a href="{{ route('home') }}"><img src="{{ asset('static/img/homepage.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('perfil') }}"><img src="{{ asset('static/img/perfil.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('ranking') }}"><img src="{{ asset('static/img/ranking.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('repaso') }}"><img src="{{ asset('static/img/repas.png') }}"></a></div>
        <div class="nav-btn"><a href="{{ route('config') }}"><img src="{{ asset('static/img/configuracio.png') }}"></a></div>
    </div>

    <!-- CONTENIDO CENTRAL -->
    <div class="rankings" style="z-index: 9999; width: 900px; left: 40%;">
        @yield('content')
    </div>

    <!-- BARRA DERECHA (igual en todas las preguntas) -->
    <div class="right-bar">
        <div class="user">
            <img src="{{ asset('static/img/avatar.png') }}" class="avatar" alt="Avatar">
            <div class="user-name">Explorador Max</div>
        </div>
        <div class="ship">
            <div class="ship-title">La teva nau</div>
            <img src="{{ asset('static/img/mi_nave.png') }}" class="ship-img" alt="Nau">
        </div>
        <div class="ranking">
            <h3>Top Exploradors</h3>
            <div class="rank-row"><span class="rank-name">1. LunaQueen</span><span class="rank-score">12.450</span></div>
            <div class="rank-row"><span class="rank-name">2. StarPilot</span><span class="rank-score">11.890</span></div>
            <div class="rank-row"><span class="rank-name">3. CosmoKid</span><span class="rank-score">10.720</span></div>
        </div>
    </div>

    <!-- BOTÓN REPÀS -->
    <div class="repas-circle">REPÀS</div>

    <script src="{{ asset('funcionalidades.js') }}"></script>
    @yield('scripts')
</body>
</html>