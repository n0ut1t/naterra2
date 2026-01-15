@extends('app', [
    'title' => 'Fi de la Missió - Naterra',
    'bodyClass' => 'final2'
])

@section('content')

    <style>
        /* 1. AMAGAR ELEMENTS DEL LAYOUT ORIGINAL */
        .sidebar { display: none !important; }
        .australia { display: none !important; }
        /* Amaguem el logo per defecte per evitar duplicats */
        .logo { display: none !important; }

        /* 2. ESTIL DEL FONS I CONTENIDOR PRINCIPAL */
        body.final2 {
            background-color: black;
            overflow: hidden; 
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .contenedor-centro {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 100;
            /* TRUC: Afegim espai a baix per empènyer tot el contingut cap AMUNT */
            padding-bottom: 80px; 
        }

        /* 3. ESTILS DELS ELEMENTS */
        
        .logo-final {
            max-width: 160px;       /* MÉS PETIT (abans 220px) */
            margin-bottom: 25px;    /* Menys marge */
            display: block;
        }

        .text-historia_final2 {
            font-size: 1.2rem;     /* Lletra un pèl més petita per guanyar espai */
            line-height: 1.6;
            max-width: 750px;
            text-align: center;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            margin-bottom: 25px;    /* Més junt amb la nau */
            padding: 0 20px;
        }

        .nau-container {
            position: relative;
            margin-bottom: 30px;    /* Més junt amb el botó */
            height: 130px;          /* Nau una mica més petita per ocupar menys verticalment */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nau {
            height: 100%;
            width: auto;
        }
        
        .lazo {
            position: absolute;
            height: 60%;
            top: -10%;
            left: -5%;
            transform: rotate(-15deg);
        }

        /* 4. BOTÓ NEON */
        .btn-neon {
            background: transparent;
            color: #FFACD6;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px 40px;      /* Botó una mica més compacte */
            border: 3px solid #FFACD6;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 0 15px #FFACD6;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            z-index: 101;
        }

        .btn-neon:hover {
            background-color: #FFACD6;
            color: black;
            box-shadow: 0 0 30px #FFACD6;
        }

    </style>

    {{-- ESTRELLES (Fons animat) --}}
    <div class="estrella" style="top:10%; left:15%; width:5px; height:5px; animation-delay:0s;"></div>
    <div class="estrella" style="top:25%; left:40%; width:4px; height:4px; animation-delay:1s;"></div>
    <div class="estrella" style="top:50%; left:80%; width:6px; height:6px; animation-delay:0.5s;"></div>
    <div class="estrella" style="top:70%; left:30%; width:5px; height:5px; animation-delay:2s;"></div>
    <div class="estrella" style="top:85%; left:60%; width:4px; height:4px; animation-delay:1.5s;"></div>
    <div class="estrella" style="top:40%; left:5%; width:5px; height:5px; animation-delay:0.8s;"></div>
    <div class="estrella" style="top:15%; left:75%; width:4px; height:4px; animation-delay:2.3s;"></div>
    <div class="estrella" style="top:60%; left:90%; width:5px; height:5px; animation-delay:1.7s;"></div>
    <div class="estrella" style="top:5%; left:50%; width:3px; height:3px; animation-delay:1.2s;"></div>
    <div class="estrella" style="top:20%; left:90%; width:6px; height:6px; animation-delay:0.6s;"></div>
    
    {{-- CONTENIDOR CENTRAL --}}
    <div class="contenedor-centro">

        {{-- LOGO --}}
        <img src="{{ asset('img/logo.svg') }}" alt="Naterra" class="logo-final">

        {{-- TEXT FINAL --}}
        <div class="text-historia_final2">
            <strong>Enhorabona, Capità! 🏆</strong><br><br>
            Has aconseguit reparar la nau i restaurar tots els sistemes.<br>
            La nau està llesta, els motors ronronegen i les estrelles esperen la teva propera aventura.<br><br>
            Prepara’t per enlairar-te… la galàxia és teva!
        </div>

        {{-- IMATGES NAU I LLAÇ --}}
        <div class="nau-container">
            <img src="{{ asset('img/nave.png') }}" alt="Nau espacial" class="nau">
            <img src="{{ asset('img/lazo.png') }}" alt="Llaç" class="lazo">
        </div>

        {{-- BOTÓ FINAL --}}
        <a href="{{ route('login') }}" class="btn-neon">
            ACABAR LA MISSIÓ
        </a>

    </div>

@endsection