@extends('app', [
    'title' => 'Mapa de Capítols - Naterra',
    'showAstronaut' => true
])

@section('content')
    <div id="ch1" class="chapter"><a href="{{ route('nivells') }}">1</a></div>
    <div id="ch2" class="chapter">
        <a href="{{ route('pregunta', [2, 1]) }}">2</a>
    </div>
    <div id="ch3" class="chapter">
        <a href="{{ route('pregunta', [3, 1]) }}">3</a>
    </div>
    <div id="ch4" class="chapter">
        <a href="{{ route('pregunta', [4, 1]) }}">4</a>
    </div>
    <div id="ch5" class="chapter">
        <a href="{{ route('pregunta', [5, 1]) }}">5</a>
    </div>
@endsection