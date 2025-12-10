@extends('layouts.app', [
    'title' => 'Mapa de Nivells - Naterra'
])

@section('content')
    <div id="p1" class="chapter"><a href="{{ route('pregunta', [1, 1]) }}">1</a></div>

    <div id="p2" class="chapter"><a href="{{ route('pregunta', [1, 2]) }}">2</a></div>
    <div id="p3" class="chapter"><a href="{{ route('pregunta', [1, 3]) }}">3</a></div>
    <div id="p4" class="chapter"><a href="{{ route('pregunta', [1, 4]) }}">4</a></div>
    <div id="p5" class="chapter"><a href="{{ route('pregunta', [1, 5]) }}">5</a></div>
    <div id="p6" class="chapter"><a href="{{ route('pregunta', [1, 6]) }}">6</a></div>
    <div id="p7" class="chapter"><a href="{{ route('pregunta', [1, 7]) }}">7</a></div>
    <div id="p8" class="chapter"><a href="{{ route('pregunta', [1, 8]) }}">8</a></div>
    <div id="p9" class="chapter"><a href="{{ route('pregunta', [1, 9]) }}">9</a></div>
    <div id="p10" class="chapter"><a href="{{ route('pregunta', [1, 10]) }}">10</a></div>
@endsection