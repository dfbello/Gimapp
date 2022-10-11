<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{

    public function index(){
        return view('perfil.cliente');
    }

    public function create(){
        return view('auth.login');
    }

    public function store() {
        $credentials = request()->only('email', 'password');

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();

            return redirect('perfil');
        }else{
            return back() -> withErrors([
                'message' => 'Correo o contraseña incorrectos, intente de nuevo'
            ]);
        }

    }

    public function destroy() {
        auth() -> logout();

        return redirect() -> to('/');
    }
}
