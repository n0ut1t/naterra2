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
        $topUsers = User::orderBy('puntuacion', 'desc')
            ->take(10)
            ->get(['id', 'name', 'puntuacion', 'icono_perfil']);

        // Add avatar_url to each user (force accessor evaluation)
        $topUsers = $topUsers->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'puntuacion' => $user->puntuacion,
                'avatar_url' => $user->avatar_url
            ];
        });

        // Usuario actual
        $currentUser = Auth::user();

        // Calcular la posición del usuario actual
        $currentUserScore = $currentUser->puntuacion ?? 0;
        $userRank = User::whereRaw('COALESCE(puntuacion, 0) > ?', [$currentUserScore])->count() + 1;

        return response()->json([
            'rankings' => $topUsers,
            'user' => [
                'name' => $currentUser->name,
                'puntuacion' => $currentUser->puntuacion,
                'rank' => $userRank,
                'avatar_url' => $currentUser->avatar_url
            ]
        ]);
    }
}
