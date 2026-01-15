@extends('app', [
    'title' => 'Enhorabona! - Naterra',
    'bodyClass' => 'final_1 configuracio'
])

@section('content')

    <style>
        
        .sidebar {
            display: none !important;
        }

        .australia {
            display: none !important;
        }

        body.final_1.configuracio {
            background-color: black;
            /* background: url("{{ asset('img/planeta.png') }}") no-repeat center center fixed !important; */
            background-size: cover !important;
        }
    </style>

    <img src="{{ asset('img/logo.svg') }}" alt="Naterra" class="logo">

    <div class="final-missatge">
        <h2>Enhorabona!</h2>
        <p>
            Has completat tots els nivells i desafiaments d’aquesta missió, i has après tot el necessari per dominar el teu entrenament.<br><br>
            Si vols, pots tornar a repassar els exercicis i reptes per reforçar els teus coneixements… o, si ho prefereixes, donar per finalitzada la història i gaudir del teu assoliment.<br><br>
            La decisió és teva, Capità. Bon viatge!
        </p>

        <div class="botons-final">
            <a href="{{ route('nivells') }}">
                <button class="boto repasar">Tornar a repassar</button>
            </a>

            <a href="{{ route('final2') }}">
                <button class="boto acabar">Acabar l'història</button>
            </a>
        </div>
    </div>

@endsection