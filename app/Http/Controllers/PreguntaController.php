<?php

namespace App\Http\Controllers;

class PreguntaController extends Controller
{
    public function show($nivel, $pregunta)
    {
        $preguntas = include base_path('app/Helpers/preguntas.php');
        
        $capitulo = intval($nivel);
        $numPregunta = intval($pregunta);
        
        if (!isset($preguntas[$capitulo])) {
            return view('error', ['mensaje' => "Capítol no trobat: $capitulo"]);
        }
        
        $lista = $preguntas[$capitulo];
        $index = max(0, $numPregunta - 1);
        
        if (!isset($lista[$index])) {
            return view('error', ['mensaje' => "Pregunta $numPregunta no trobada"]);
        }
        
        $pregActual = $lista[$index];
        $totalPreguntas = count($lista);
        $hasNext = ($numPregunta < $totalPreguntas);
        
        return view('juego', [
            'capitulo' => $capitulo,
            'numPregunta' => $numPregunta,
            'pregActual' => $pregActual,
            'totalPreguntas' => $totalPreguntas,
            'hasNext' => $hasNext
        ]);
    }
    
    public function guardarPuntos()
    {
        $capitulo = request('capitulo');
        $puntos = request('puntos');
        
        if (auth()->check()) {
            // Guardar en la base de datos cuando implementes la tabla
            // Por ahora solo retorna éxito
            return response()->json(['success' => true, 'mensaje' => 'Puntos guardados']);
        }
        
        return response()->json(['success' => false, 'mensaje' => 'Usuario no autenticado'], 401);
    }
}
