@extends('app', [
    'title' => 'Perfil - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div class="puzzle" style="height: 550px; width: 600px;">
        <div class="slot question">?</div>
        <div class="slot question">?</div>
        <div class="slot question">?</div>
        <div class="slot"><img src="{{ asset('img/pieza1.png') }}"></div>
        <div class="slot"><img src="{{ asset('img/pieza2.png') }}"></div>
        <div class="slot"><img src="{{ asset('img/pieza4.png') }}"></div>
        <div class="slot"><img src="{{ asset('img/pieza3-5.png') }}"></div>
        <div class="slot"><img src="{{ asset('img/pieza6.png') }}"></div>
        <div class="slot"><img src="{{ asset('img/pieza3-5.png') }}"></div>
    </div>

    <div class="right-bar">
        <div class="user" style="margin-top: 0; height: 60px;">
            <img src="{{ asset('img/avatar.png') }}" class="avatar">
            <div class="user-name">Explorador Max</div>
        </div>
        <div class="ship" style="margin-top: 0px; height: 275px;">
            <div class="ship-title">La teva nau</div>
            <img src="{{ asset('img/mi_nave.png') }}" class="ship-img">
        </div>
        <div class="ranking" style="margin-top: 0;">
            <h3>Top Exploradors</h3>
            <div class="rank-row"><span class="rank-name">1. LunaQueen</span><span class="rank-score">12.450</span></div>
            <div class="rank-row"><span class="rank-name">2. StarPilot</span><span class="rank-score">11.890</span></div>
            <div class="rank-row"><span class="rank-name">3. CosmoKid</span><span class="rank-score">10.720</span></div>
        </div>
    </div>

    <div class="repas-circle">REPÀS</div>
@endsection