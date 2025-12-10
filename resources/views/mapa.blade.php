@extends('layouts.app', [
    'title' => 'Mapa de Capítols - Naterra',
    'showAstronaut' => true
])

@section('content')
    <div id="ch1" class="chapter"><a href="{{ route('nivells') }}">1</a></div>
    <div id="ch2" class="chapter"><a href="{{ route('nivells') }}">2</a></div>
    <div id="ch3" class="chapter"><a href="{{ route('nivells') }}">3</a></div>
    <div id="ch4" class="chapter"><a href="{{ route('nivells') }}">4</a></div>
    <div id="ch5" class="chapter"><a href="{{ route('nivells') }}">5</a></div>
@endsection