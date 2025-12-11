<?php

$preguntas = include 'app/Helpers/preguntas.php';

foreach ($preguntas as $cap => $lista) {
    foreach ($lista as $idx => $preg) {
        $num = $idx + 1;
        $viewFile = "resources/views/preguntas/pregunta_c{$cap}_p{$num}.blade.php";
        
        $opciones_html = '';
        foreach ($preg['opciones'] as $j => $opcion) {
            $opcion_escaped = addslashes($opcion);
            $opciones_html .= "                    <button class='opcion-btn' onclick='marcar($j)' style='display:block; width:100%; text-align:left; margin:6px 0; padding:10px; border-radius:6px'>$opcion</button>\n";
        }
        
        $preg_escaped = addslashes($preg['pregunta']);
        
        $content = "@extends('app', [
    'title' => 'Pregunta $num - Capítol $cap',
    'logoStyle' => 'left: 770px; top: 0px;',
    'bodyClass' => 'body_mapa'
])

@section('content')
    <div style='padding: 20px'>
        <div style='display:flex; gap:20px; align-items:flex-start'>
            <div style='flex:1'>
                <h2>Capítol $cap — Pregunta $num</h2>
                <p style='font-size:18px; background:#fff; padding:15px; border-radius:6px'>{$preg['pregunta']}</p>

                <div style='margin-top:12px'>
$opciones_html                </div>

                <div style='margin-top:16px; display:flex; gap:10px'>
                    <a href=\"{{ route('pregunta', [$cap, " . max(1, $num - 1) . "]) }}\"><button>Anterior</button></a>
                    @if($num < 10)
                        <a href=\"{{ route('pregunta', [$cap, " . ($num + 1) . "]) }}\"><button>Següent</button></a>
                    @else
                        <button disabled style='opacity:0.5'>Següent</button>
                    @endif
                    <a href=\"{{ route('nivells') }}\"><button>Tornar a Nivells</button></a>
                </div>
            </div>

            <div style='width:260px'>
                <div style='background:#fff; padding:12px; border-radius:8px'>
                    <h4>Informació</h4>
                    <p>Capítol: <strong>$cap</strong></p>
                    <p>Pregunta: <strong>$num</strong> / 10</p>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            function marcar(i) {
                const buttons = document.querySelectorAll('.opcion-btn');
                buttons.forEach(b => b.style.background = '#fff');
                buttons[i].style.background = '#c8ffd6';
            }
        </script>
    @endsection
@endsection";
        
        file_put_contents($viewFile, $content);
        echo "Creada: $viewFile\n";
    }
}

echo "\n✅ ¡Todas las 50 vistas han sido generadas!\n";
?>
