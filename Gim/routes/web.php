<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignarrutinaController;
use App\Http\Controllers\ClaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/asignarrutina', [App\Http\Controllers\AsignarrutinaController::class, 'index'])->name('asignarRutina');
Route::post('/asignarrutina', [App\Http\Controllers\AsignarrutinaController::class, 'store'])->name('asignarRutina.store');

Route::get('/verrutinas', [App\Http\Controllers\VerrutinaController::class, 'viewRutinas'])->name('verrutinas');
Route::get('/verrutinas/{id}/editar', [App\Http\Controllers\ModificarrutinaController::class, 'editarRutina'])->name('modificarRutina');
Route::patch('/verrutinas/{id}', [App\Http\Controllers\ModificarrutinaController::class, 'actualizarRutina'])->name('actualizarRutina');
Route::delete('verrutinas/{id}', [App\Http\Controllers\VerrutinaController::class, 'eliminarRutina'])->name('eliminarRutina');

Route::resource('/Clases', App\Http\Controllers\ClaseController::class);
