<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User; // Necessari per crear usuaris nous

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PÀGINA D'INICI (Si estàs loguejat -> Mapa, si no -> Login) ---
Route::get('/', function () {
    if (Auth::check()) {
        return view('mapa');
    }
    return redirect()->route('login');
})->name('home');

// --- RUTES D'AUTENTICACIÓ (Login i Registre) ---

// 1. Mostrar Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// 2. Processar Login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('mapa'); // Et porta al mapa
    }

    return back()->withErrors([
        'email' => 'Les credencials no coincideixen.',
    ])->onlyInput('email');
});

// 3. Mostrar Registre
Route::get('/register', function () {
    return view('register'); // Assegura't que tens register.blade.php
})->name('register');

// 4. Processar Registre (Crear usuari)
Route::post('/register', function (Request $request) {
    // Validem les dades
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Creem l'usuari a la Base de Dades
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // El loguegem automàticament i l'enviem al mapa
    Auth::login($user);

    return redirect()->route('home');
})->name('register.store');

// 5. Logout (Sortir)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


// --- RUTES DEL JOC (Protegides: només si estàs loguejat) ---
Route::middleware('auth')->group(function () {
    
    Route::get('/mapa', function () {
        return view('mapa');
    })->name('mapa');

    Route::get('/nivells', fn() => view('nivells'))->name('nivells');
    
    Route::get('/perfil', fn() => view('perfil'))->name('perfil');
    Route::get('/ranking', fn() => view('ranking'))->name('ranking');
    Route::get('/repaso', fn() => view('repaso'))->name('repaso');
    Route::get('/config', fn() => view('config'))->name('config');

    // Rutes amb controlador (assegura't que tens el PreguntaController creat)
    Route::get('/pregunta/{nivel}/{pregunta}', 'App\Http\Controllers\PreguntaController@show')->name('pregunta');
    Route::post('/guardar-puntos', 'App\Http\Controllers\PreguntaController@guardarPuntos')->name('guardar-puntos');
});