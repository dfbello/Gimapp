<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $user = User::create(request(['name', 'email', 'password']));

        return redirect()->to('/');
    }
}
