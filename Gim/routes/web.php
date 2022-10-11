<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\groupClassController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', [SessionsController::class, 'create']) -> name('login.index');
Route::get('/register', [RegisterController::class, 'create']) -> name('register.index');
Route::resource('/group_class', groupClassController::class);