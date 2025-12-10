@extends('layouts.app', [
    'title' => 'Perfil - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div class="puzzle">
        <div class="slot question">?</div>
        <div class="slot question">?</div>
        <div class="slot question">?</div>
        <div class="slot"><img src="{{ asset('static/img/pieza1.png') }}"></div>
        <div class="slot"><img src="{{ asset('static/img/pieza2.png') }}"></div>
        <div class="slot"><img src="{{ asset('static/img/pieza4.png') }}"></div>
        <div class="slot"><img src="{{ asset('static/img/pieza3-5.png') }}"></div>
        <div class="slot"><img src="{{ asset('static/img/pieza6.png') }}"></div>
        <div class="slot"><img src="{{ asset('static/img/pieza3-5.png') }}"></div>
    </div>

    <div class="right-bar">
        <div class="user">
            <img src="{{ asset('static/img/avatar.png') }}" class="avatar">
            <div class="user-name">Explorador Max</div>
        </div>
        <div class="ship">
            <div class="ship-title">La teva nau</div>
            <img src="{{ asset('static/img/mi_nave.png') }}" class="ship-img">
        </div>
        <div class="ranking">
            <h3>Top Exploradors</h3>
            <div class="rank-row"><span class="rank-name">1. LunaQueen</span><span class="rank-score">12.450</span></div>
            <div class="rank-row"><span class="rank-name">2. StarPilot</span><span class="rank-score">11.890</span></div>
            <div class="rank-row"><span class="rank-name">3. CosmoKid</span><span class="rank-score">10.720</span></div>
        </div>
    </div>

    <div class="repas-circle">REPÀS</div>
@endsection