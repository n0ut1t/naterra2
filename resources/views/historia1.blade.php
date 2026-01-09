<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Història 1 - Naterra</title>
    
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_naterra.png') }}">

    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Arial', sans-serif; /* Pots canviar-ho per la teva font */
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .text-historia {
            max-width: 800px;
            font-size: 1.4em;
            margin-bottom: 30px;
            padding: 0 20px;
            z-index: 2;
            line-height: 1.6;
            text-shadow: 0 2px 4px rgba(0,0,0,0.8);
        }

        /* LOGO */
        .logo {
            width: 150px; /* Una mica més gran */
            margin-bottom: 30px;
            z-index: 2;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
        }

        /* NAU */
        .nau {
            width: 400px;
            max-width: 90%;
            z-index: 2;
            margin-bottom: 30px;
            animation: flotar 3s infinite ease-in-out;
        }

        @keyframes flotar {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* ESTRELLES DE FONS */
        .estrella {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: parpelleig 2s infinite ease-in-out;
            box-shadow: 0 0 8px 2px white;
        }

        @keyframes parpelleig {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.4); }
        }

        /* BOTÓ CONTINUAR (Estil Neó Verd) */
        .btn-continuar {
            z-index: 10;
            background-color: rgba(30, 30, 40, 0.8);
            color: white;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: bold;
            border: 2px solid #2ecc71;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 0 10px rgba(46, 204, 113, 0.3);
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-continuar:hover {
            background-color: rgba(46, 204, 113, 0.2);
            box-shadow: 0 0 20px rgba(46, 204, 113, 0.6);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

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
    <div class="estrella" style="top:80%; left:10%; width:4px; height:4px; animation-delay:2.1s;"></div>
    <div class="estrella" style="top:65%; left:70%; width:5px; height:5px; animation-delay:1.8s;"></div>
    <div class="estrella" style="top:35%; left:55%; width:3px; height:3px; animation-delay:0.3s;"></div>
    <div class="estrella" style="top:45%; left:25%; width:4px; height:4px; animation-delay:2.4s;"></div>
    <div class="estrella" style="top:90%; left:85%; width:5px; height:5px; animation-delay:1.1s;"></div>

    <img src="{{ asset('img/logo.svg') }}" alt="Naterra" class="logo">

    <div class="text-historia">
        Ets un militar que va marxar fa 10 anys a l’espai per salvar el teu planeta,<br>
        però després d'una dècada, la teva nau espacial es trenca en ple espai i cau a Naterra,<br>
        escampant les seves peces per tot arreu...
    </div>

    <img src="{{ asset('img/nave.png') }}" alt="Nau espacial" class="nau">

    <a href="{{ route('historia2') }}" class="btn-continuar"> Seguent</a>

</body>
</html>