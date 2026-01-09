<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Història 2 - Naterra</title>
    
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_naterra.png') }}">

    <style>
        /* --- ESTIL DEL FONS (EL PLANETA) --- */
        body {
            background: url("{{ asset('img/planeta.png') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow-x: hidden;
            position: relative;
        }

        /* LOGO */
        .logo {
            width: 100px; /* Una mica més petit */
            margin-top: 20px;
            margin-bottom: 10px;
            z-index: 2;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.8));
        }

        /* --- ASTRONAUTA I MISSATGE --- */
        .astronauta-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            margin-bottom: 20px;
        }

        .astronauta {
            width: 120px;
            animation: flotar 5s infinite ease-in-out;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.5));
        }

        @keyframes flotar {
            0%, 100% { transform: translateY(0) rotate(3deg); }
            50% { transform: translateY(-15px) rotate(-3deg); }
        }

        .missatge-astronauta {
            background-color: white;
            color: black;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 1rem;
            position: relative;
            margin-top: -15px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* TEXT PRINCIPAL */
        .text-historia2 {
            max-width: 650px;
            font-size: 1.2em;
            margin-bottom: 20px;
            padding: 20px;
            z-index: 2;
            line-height: 1.5;
            text-shadow: 2px 2px 4px #000000; 
            background-color: rgba(0, 0, 0, 0.4); /* Fons semi-transparent */
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* --- LES PECES ESCAMPADES PEL PLANETA --- */
        .nau-peces-container {
            position: relative;
            width: 100%;
            max-width: 800px; /* Amplada màxima on cauran les peces */
            height: 200px; /* Espai vertical per distribuir-les */
            margin-bottom: 30px;
            z-index: 1;
        }

        .nau-part {
            position: absolute; /* Això ens permet moure-les lliurement */
            width: 80px;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.8));
            opacity: 0.9;
            transition: transform 0.3s ease;
        }

        /* Posicions específiques per cada peça */
        .esquerra {
            top: 20%;
            left: 10%;
            transform: rotate(-15deg);
        }

        .inferior {
            bottom: 0%;
            left: 50%;
            transform: translateX(-50%) rotate(5deg); /* Centrada a baix */
        }

        .dreta {
            top: 30%;
            right: 10%;
            transform: rotate(20deg);
        }

        .nau-part:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 15px rgb(172, 180, 189));
            z-index: 10;
        }

        /* --- BOTÓ FINAL (Més petit i transparent) --- */
        .btn-start {
            z-index: 10;
            /* Ara és molt més transparent, similar al text */
            background-color: rgba(0, 0, 0, 0.4); 
            color: white;
            /* Mida reduïda */
            padding: 10px 30px;
            font-size: 1.1rem;
            font-weight: bold;
            /* Borde més fi */
            border: 2px solid #2e92cc;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            /* Brillantor més subtil */
            box-shadow: 0 0 10px rgba(46, 146, 204, 0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .btn-start:hover {
            background-color: rgba(46, 117, 204, 0.3);
            box-shadow: 0 0 20px rgba(46, 172, 204, 0.8);
            transform: scale(1.05);
            color: white;
        }

    </style>
</head>
<body class="historia-2">

    <img src="{{ asset('img/logo.svg') }}" alt="Naterra" class="logo">

    <div class="astronauta-container">
        <div class="missatge-astronauta">A l’aventura!</div>
        <img src="{{ asset('img/astronauta.png') }}" alt="Astronauta" class="astronauta">
    </div>
    
    <div class="text-historia2">
        A partir d’ara hauràs de superar nivells plens de reptes i proves, i durant aquest camí també aprendràs coses noves;<br>
        si aconsegueixes trobar totes les peces i arreglar la nau, podràs tornar a l’espai i completar la teva missió! Bona sort Capità!<br><br>
    </div>

    <div class="nau-peces-container">
        <img src="{{ asset('img/lado_izquierdo_nave.png') }}" alt="Nau esquerra" class="nau-part esquerra">
        <img src="{{ asset('img/lado_inferior_nave.png') }}" alt="Nau inferior" class="nau-part inferior">
        <img src="{{ asset('img/lado_derecho_nave.png') }}" alt="Nau dreta" class="nau-part dreta">
    </div>

    <a href="{{ route('mapa') }}" class="btn-start">
        COMENÇAR MISSIÓ
    </a>

</body>
</html>