<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/administrador', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource ('/administrador/Inscripcion', App\Http\Controllers\InscripcionController::class);
Route::resource ('/administrador/Carrera', App\Http\Controllers\CarreraController::class);
Route::resource ('/administrador/Egreso', App\Http\Controllers\EgresoController::class);
Route::resource ('/administrador/ModalidadPago', App\Http\Controllers\ModalidadPagoController::class);
Route::resource ('/administrador/Pago', App\Http\Controllers\PagoController::class);
Route::resource ('/administrador/Persona', App\Http\Controllers\PersonaController::class);
Route::resource ('/administrador/Proceso', App\Http\Controllers\ProcesoController::class);
Route::resource ('/administrador/Sede', App\Http\Controllers\SedeController::class);








Route::get('inscripcion/login', [App\Http\Controllers\LoginInscripcionController::class, 'index'])->name('usuario.login');
Route::post('inscripcion/logout', [App\Http\Controllers\LoginInscripcionController::class, 'logout'])->name('usuario.logout');

Route::get('inscripcion', [App\Http\Controllers\UsuarioInscripcionController::class, 'index'])->middleware('auth:pagos')->name('usuario-terminos-condiciones');
Route::get('inscripcion/sede', [App\Http\Controllers\UsuarioInscripcionController::class, 'sede'])->middleware('auth:pagos')->name('usuario-sede');
Route::get('inscripcion/pagos/{id}', [App\Http\Controllers\UsuarioInscripcionController::class, 'pagos'])->middleware('auth:pagos')->name('usuario-pagos');
Route::get('inscripcion/{id}', [App\Http\Controllers\UsuarioInscripcionController::class, 'inscripcion'])->middleware('auth:pagos')->name('usuario-inscripcion');
Route::get('inscripcion/pdf/{id}', [App\Http\Controllers\UsuarioInscripcionController::class, 'pdf'])->middleware('auth:pagos')->name('usuario-pdf');
// Route::get('inscripcion/pdf/{id}', [App\Http\Controllers\UsuarioInscripcionController::class, 'pdf'])->name('usuario-pdf');