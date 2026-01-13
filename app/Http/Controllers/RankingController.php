<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    public function index()
    {
        return view('ranking');
    }

    public function fetchData()
    {
        // Obtener los 10 mejores usuarios ordenados por puntuacion
        // Asegúrate de que tu base de datos tenga la columna 'puntuacion' (y no 'puntuacio')
        $topUsers = User::orderBy('puntuacion', 'desc')
                        ->take(10)
                        ->get(['id', 'name', 'puntuacion']);

        // Usuario actual
        $currentUser = Auth::user();
        
        // Calcular la posición del usuario actual
        // Contamos cuántos usuarios tienen más puntuación que el actual (tratando null como 0)
        $currentUserScore = $currentUser->puntuacion ?? 0;
        $userRank = User::whereRaw('COALESCE(puntuacion, 0) > ?', [$currentUserScore])->count() + 1;

        return response()->json([
            'rankings' => $topUsers,
            'user' => [
                'name' => $currentUser->name,
                'puntuacion' => $currentUser->puntuacion,
                'rank' => $userRank
            ]
        ]);
    }
}
