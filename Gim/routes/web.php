<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignarrutinaController;

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
