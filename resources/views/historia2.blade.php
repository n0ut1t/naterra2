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
            /* Mantenim la teva imatge planeta.png */
            background: url("{{ asset('img/planeta.png') }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            /* CANVI CLAU: Alçada fixa i sense scroll */
            height: 100vh; 
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly; /* Distribueix l'espai millor */
            align-items: center;
            text-align: center;
            overflow: hidden; /* Adéu scroll */
            position: relative;
        }

        /* LOGO (Reduït per guanyar espai) */
        .logo {
            width: 80px; 
            margin-top: 10px;
            z-index: 2;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.8));
        }

        /* --- ASTRONAUTA I MISSATGE --- */
        .astronauta-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            margin-bottom: 0;
        }

        .astronauta {
            width: 90px; /* Reduït de 120px a 90px */
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
            padding: 5px 15px; /* Una mica més compacte */
            border-radius: 15px;
            font-weight: bold;
            font-size: 0.9rem;
            position: relative;
            margin-top: -10px;
            margin-bottom: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* TEXT PRINCIPAL */
        .text-historia2 {
            max-width: 650px;
            font-size: 1rem; /* Text lleugerament més petit */
            padding: 15px;
            z-index: 2;
            line-height: 1.4;
            text-shadow: 2px 2px 4px #000000; 
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* --- LES PECES ESCAMPADES --- */
        .nau-peces-container {
            position: relative;
            width: 100%;
            max-width: 600px; 
            height: 120px; /* Reduït de 200px a 120px */
            margin-bottom: 10px;
            z-index: 1;
        }

        .nau-part {
            position: absolute;
            width: 60px; /* Reduït de 80px a 60px */
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.8));
            opacity: 0.9;
            transition: transform 0.3s ease;
        }

        /* Posicions ajustades al nou contenidor més petit */
        .esquerra {
            top: 10%;
            left: 15%;
            transform: rotate(-15deg);
        }

        .inferior {
            bottom: 5%;
            left: 50%;
            transform: translateX(-50%) rotate(5deg);
        }

        .dreta {
            top: 20%;
            right: 15%;
            transform: rotate(20deg);
        }

        .nau-part:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 15px rgb(172, 180, 189));
            z-index: 10;
        }

        /* --- BOTÓ FINAL (Els teus colors blaus) --- */
        .btn-start {
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.4); 
            color: white;
            /* Mida reduïda */
            padding: 8px 25px;
            font-size: 1rem;
            font-weight: bold;
            /* Els teus colors originals */
            border: 2px solid #2e92cc;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 0 10px rgba(46, 146, 204, 0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
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

    <div class="astronauta-container" style="position: absolute !important; bottom: 70px !important; left: calc(50% - 250px) !important; z-index: 999; width: auto; height: auto;">        
        <img src="{{ asset('img/astronauta.png') }}" alt="Astronauta" class="astronauta">
    </div>
    
    <div class="text-historia2">
        A partir d’ara hauràs de superar nivells plens de reptes i proves, i durant aquest camí també aprendràs coses noves;<br>
        si aconsegueixes trobar totes les peces i arreglar la nau, podràs tornar a l’espai i completar la teva missió! Bona sort Capità!<br>
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