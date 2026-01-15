<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PÀGINA D'INICI (Si estàs loguejat -> Mapa, si no -> Login) ---
Route::get('/', function () {
    if (Auth::check()) {
        // Opcional: Si ja estàs dins, potser vols anar al mapa directament
        // o tornar a veure la història. De moment ho deixem al mapa.
        return redirect()->route('mapa');
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

        // --- CANVI IMPORTANT AQUÍ ---
        // Abans anava a 'mapa', ara va a 'historia1'
        return redirect()->route('historia1');
    }

    return back()->withErrors([
        'email' => 'Les credencials no coincideixen.',
    ])->onlyInput('email');
});

// 3. Mostrar Registre
Route::get('/register', function () {
    return view('register');
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

    // El loguegem automàticament
    Auth::login($user);

    // --- CANVI IMPORTANT TAMBÉ AQUÍ ---
    // Quan es registrin, també els enviem a la història
    return redirect()->route('historia1');
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

    // Ruta de la Història (L'he mogut aquí perquè estigui protegida)
    Route::get('/historia1', function () {
        return view('historia1');
    })->name('historia1');
    
     // Ruta de la Història 2
    Route::get('/historia2', function () {
        return view('historia2');
    })->name('historia2');

    // --- NOVES RUTES FINAL (AFEGIDES AQUÍ) ---
    Route::get('/final1', function () {
        return view('final1');
    })->name('final1');

    Route::get('/final2', function () {
        return view('final2');
    })->name('final2');
    // ----------------------------------------

    Route::get('/mapa', function () {
        return view('mapa');
    })->name('mapa');

    Route::get('/nivells', fn() => view('nivells'))->name('nivells');

    Route::get('/joc/{nivel}/{pregunta}', 'App\Http\Controllers\PreguntaController@show')->name('pregunta');

    Route::get('/perfil', fn() => view('perfil'))->name('perfil');
    Route::post('/perfil/foto', [App\Http\Controllers\ProfileController::class, 'uploadPhoto'])->name('perfil.foto');
    Route::get('/ranking', [App\Http\Controllers\RankingController::class, 'index'])->name('ranking');
    Route::get('/ranking/data', [App\Http\Controllers\RankingController::class, 'fetchData'])->name('ranking.data');
    Route::get('/repaso', fn() => view('repaso'))->name('repaso');
    Route::get('/config', fn() => view('config'))->name('config');

    // Rutes amb controlador (assegura't que tens el PreguntaController creat)
    Route::post('/guardar-puntos', 'App\Http\Controllers\PreguntaController@guardarPuntos')->name('guardar-puntos');
});