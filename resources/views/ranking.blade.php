@extends('layouts.app', [
    'title' => 'Ranking - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div class="rankings" style="z-index: 9999;">
        <div class="top3">
            <div class="top-circle"><img src="{{ asset('static/img/top1.jpg') }}"><div class="top-pos">1</div></div>
            <div class="top-circle"><img src="{{ asset('static/img/top2.jpg') }}"><div class="top-pos">2</div></div>
            <div class="top-circle"><img src="{{ asset('static/img/top3.jpg') }}"><div class="top-pos">3</div></div>
        </div>

        <div class="ranking-box">
            <h3>Ranking Global</h3>
            <div class="rank-row"><span class="rank-name">1. LunaQueen</span><span class="rank-score">14.320</span></div>
            <div class="rank-row"><span class="rank-name">2. StarPilot</span><span class="rank-score">13.890</span></div>
            <div class="rank-row"><span class="rank-name">3. CosmoKid</span><span class="rank-score">12.710</span></div>
            <div class="rank-row"><span class="rank-name">4. AstroMax</span><span class="rank-score">11.200</span></div>
            <div class="rank-row"><span class="rank-name">5. NovaGirl</span><span class="rank-score">10.850</span></div>
            <div class="rank-row"><span class="rank-name">6. Tu</span><span class="rank-score">9.920</span></div>
        </div>
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
    </div>

    <div class="repas-circle">REPÀS</div>
@endsection