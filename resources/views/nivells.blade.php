@extends('app', [
    'title' => 'Mapa de Nivells - Naterra'
])

@section('content')
    <div id="p1" class="chapter"><a href="{{ route('pregunta', [1, 1]) }}" style="text-decoration:none">1</a></div>

    <div id="p2" class="chapter"><a href="{{ route('pregunta', [1, 2]) }}" style="text-decoration:none">2</a></div>
    <div id="p3" class="chapter"><a href="{{ route('pregunta', [1, 3]) }}" style="text-decoration:none">3</a></div>
    <div id="p4" class="chapter"><a href="{{ route('pregunta', [1, 4]) }}" style="text-decoration:none">4</a></div>
    <div id="p5" class="chapter"><a href="{{ route('pregunta', [1, 5]) }}" style="text-decoration:none">5</a></div>
    <div id="p6" class="chapter"><a href="{{ route('pregunta', [1, 6]) }}" style="text-decoration:none">6</a></div>
    <div id="p7" class="chapter"><a href="{{ route('pregunta', [1, 7]) }}" style="text-decoration:none">7</a></div>
    <div id="p8" class="chapter"><a href="{{ route('pregunta', [1, 8]) }}" style="text-decoration:none">8</a></div>
    <div id="p9" class="chapter"><a href="{{ route('pregunta', [1, 9]) }}" style="text-decoration:none">9</a></div>
    <div id="p10" class="chapter"><a href="{{ route('pregunta', [1, 10]) }}" style="text-decoration:none"   >10</a></div>
@endsection

