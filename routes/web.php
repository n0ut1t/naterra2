<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- RUTES PRINCIPALS ---
Route::get('/', function () {
    return view('mapa');
})->name('home');

Route::get('/nivells', fn() => view('nivells'))->name('nivells');
Route::get('/perfil', fn() => view('perfil'))->name('perfil');
Route::get('/ranking', fn() => view('ranking'))->name('ranking');
Route::get('/repaso', fn() => view('repaso'))->name('repaso');
Route::get('/config', fn() => view('config'))->name('config');

// --- RUTES DEL JOC ---
Route::get('/pregunta/{nivel}/{pregunta}', 'App\Http\Controllers\PreguntaController@show')->name('pregunta');
Route::post('/guardar-puntos', 'App\Http\Controllers\PreguntaController@guardarPuntos')->name('guardar-puntos');


// --- RUTES D'AUTENTICACIÓ (NOVES) ---

// 1. Mostrar el formulari de Login
Route::get('/login', function () {
    return view('login'); // Busca el fitxer a resources/views/login.blade.php
})->name('login');

// 2. Rebre les dades del Login (temporalment no fa res, només evita l'error 405)
Route::post('/login', function () {
    return "Aquí validarem l'usuari properament";
}); 

// 3. Mostrar el formulari de Registre (si tens el fitxer register.blade.php creat)
Route::get('/register', function () {
    return view('register'); // Busca el fitxer a resources/views/register.blade.php
})->name('register');

// 4. Rebre les dades del Registre (temporal)
Route::post('/register', function () {
    return "Aquí crearem l'usuari properament";
})->name('register.store'); // Nom extra per si el formulari el busca així