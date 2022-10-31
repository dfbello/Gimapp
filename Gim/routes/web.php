<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\RutinaController;

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

Route::resource('/rutinas', App\Http\Controllers\rutinaController::class);

Route::resource('/Clases', App\Http\Controllers\ClaseController::class);
Route::resource('/Rutinas', App\Http\Controllers\RutinaController::class);
