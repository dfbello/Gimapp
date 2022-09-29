<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [SessionsController::class, 'create']) -> name('login.index');
Route::get('/register', [RegisterController::class, 'create']) -> name('register.index');