<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ejercicioController;
use App\Http\Controllers\rutinaController;
use App\Http\Controllers\entrenamientoController;
use App\Http\Controllers\groupClassController;
use App\Http\Controllers\recursoController;
use App\Http\Controllers\EntrenadorController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', [SessionsController::class, 'create']) -> name('login.create')->middleware('guest');
Route::get('/perfil', [SessionsController::class, 'index']) -> name('login.index')->middleware('auth');
Route::get('/register', [RegisterController::class, 'create']) -> name('register.index')->middleware('can:trainer.admin');;
Route::post('/register',[RegisterController::class, 'store']) -> name('register.store')->middleware('can:trainer.admin');;
Route::post('/login', [SessionsController::class, 'store']) -> name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy']) -> name('login.destroy');
Route::resource('/cliente', ClienteController::class);
Route::resource('/ejercicio', ejercicioController::class);
Route::resource('/entrenamiento', entrenamientoController::class);
Route::resource('/rutinas', rutinaController::class);
Route::resource('/recursos', recursoController::class);
Route::resource('/group_class', groupClassController::class);
Route::resource('/entrenador', EntrenadorController::class);
Route::post('/group_class/{id}/inscribirse',[groupClassController::class,'inscribirCliente']);
Route::get('/cliente/{id}/asignarEntrenamiento',[ClienteController::class,'asignarEntrenamiento']);

