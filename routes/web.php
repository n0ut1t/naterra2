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

Route::get('/', function () {
    return view('mapa');
});

Route::get('/nivells', fn() => view('nivells'))->name('nivells');
Route::get('/perfil', fn() => view('perfil'))->name('perfil');
Route::get('/ranking', fn() => view('ranking'))->name('ranking');
Route::get('/repaso', fn() => view('repaso'))->name('repaso');  // crea la vista cuando quieras
Route::get('/config', fn() => view('config'))->name('config');
