<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [SessionsController::class, 'create']) -> name('login.create');
Route::get('/perfil', [SessionsController::class, 'index']) -> name('login.index');
Route::get('/register', [RegisterController::class, 'create']) -> name('register.index');
Route::post('/register',[RegisterController::class, 'store']) -> name('register.store');
Route::post('/login', [SessionsController::class, 'store']) -> name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy']) -> name('login.destroy');
Route::resource('/cliente', ClienteController::class);
