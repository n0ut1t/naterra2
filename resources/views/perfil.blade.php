@extends('app', [
    'title' => 'Perfil - Naterra',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@php
    // Calcular posición del ranking
    $currentUserScore = Auth::user()->puntuacion ?? 0;
    $userRank = \App\Models\User::whereRaw('COALESCE(puntuacion, 0) > ?', [$currentUserScore])->count() + 1;
@endphp

@section('content')
    <div style="display: flex; align-items: center; justify-content: center; min-height: 80vh; padding: 20px; gap: 50px;">
        
        {{-- SECCIÓN PERFIL CENTRADA --}}
        <div class="puzzle" style="width: 600px; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px;">
            
            {{-- AVATAR CON BOTÓN DE CÁMARA --}}
            <div style="position: relative; display: inline-block; margin-bottom: 30px;">
                <img src="{{ Auth::user()->avatar_url }}" class="avatar" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; border: 5px solid #FFACD6;">
                <label for="foto-input" style="position: absolute; bottom: 10px; right: 10px; background: #FFACD6; border-radius: 50%; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 3px solid #fff;">
                    <span style="font-size: 24px;">📷</span>
                </label>
            </div>
            
            {{-- NOMBRE DE USUARIO --}}
            <div class="user-name" style="font-size: 2em; margin-bottom: 15px; text-align: center;">{{ Auth::user()->name }}</div>
            
            {{-- PUNTUACIÓN Y RANKING --}}
            <div style="display: flex; gap: 30px; margin-bottom: 25px;">
                <div style="text-align: center;">
                    <div style="color: #fff; font-size: 1em; opacity: 0.8;">Punts</div>
                    <div style="color: #FFF30E; font-size: 1.8em; font-weight: bold;">{{ Auth::user()->puntuacion ?? 0 }}</div>
                </div>
                <div style="text-align: center;">
                    <div style="color: #fff; font-size: 1em; opacity: 0.8;">Posició</div>
                    <div style="color: #FFACD6; font-size: 1.8em; font-weight: bold;">#{{ $userRank }}</div>
                </div>
            </div>
            
            {{-- FORMULARIO DE FOTO --}}
            <form action="{{ route('perfil.foto') }}" method="POST" enctype="multipart/form-data" id="foto-form">
                @csrf
                <input type="file" name="foto" id="foto-input" accept="image/*" style="display: none;" onchange="document.getElementById('foto-form').submit();">
                <button type="button" onclick="document.getElementById('foto-input').click();" style="background: #28428C; color: #fff; border: none; padding: 15px 35px; border-radius: 10px; cursor: pointer; font-size: 1.1em; font-weight: bold;">
                    Canviar Foto
                </button>
            </form>
            
            {{-- MENSAJES --}}
            @if(session('status') === 'foto-actualizada')
                <div style="color: #90EE90; font-size: 1.1em; margin-top: 20px;">✓ Foto actualitzada!</div>
            @endif
            
            @error('foto')
                <div style="color: #FF6B6B; font-size: 1.1em; margin-top: 20px;">{{ $message }}</div>
            @enderror
        </div>
        
        {{-- RANKING WIDGET --}}
        <div style="min-width: 280px;">
            @include('partials.ranking_widget')
        </div>
        
    </div>

    <div class="repas-circle">REPÀS</div>
@endsection