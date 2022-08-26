<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/administrador', [App\Http\Controllers\HomeController::class, 'index'])->name('home');










Route::get('inscripcion/login', [App\Http\Controllers\LoginInscripcionController::class, 'index'])->name('usuario.login');
Route::post('inscripcion/logout', [App\Http\Controllers\LoginInscripcionController::class, 'logout'])->name('usuario.logout');

Route::get('inscripcion/terminos-condiciones', [App\Http\Controllers\UsuarioInscripcionController::class, 'index'])->middleware('auth:pagos')->name('usuario-terminos-condiciones');