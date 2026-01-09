<?php

namespace App\Http\Controllers;

use App\Models\CapituloCompletado;

class NivellController extends Controller
{
    public function show()
    {
        $capitulosDisponibles = [];
        
        if (auth()->check()) {
            // Obtener capítulos completados
            $capitulosCompletados = CapituloCompletado::where('user_id', auth()->id())
                ->pluck('capitulo')
                ->toArray();
            
            // El capítulo 1 siempre está disponible
            $capitulosDisponibles[] = 1;
            
            // Los capítulos posteriores se desbloquean si el anterior fue completado
            for ($i = 2; $i <= 5; $i++) {
                if (in_array($i - 1, $capitulosCompletados)) {
                    $capitulosDisponibles[] = $i;
                }
            }
        } else {
            // Si no está logueado, solo capítulo 1
            $capitulosDisponibles = [1];
        }
        
        return view('nivells', [
            'capitulosDisponibles' => $capitulosDisponibles,
            'capitulosCompletados' => $capitulosCompletados ?? []
        ]);
    }
}
