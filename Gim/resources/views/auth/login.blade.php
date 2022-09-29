@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="form-signin w-100 m-auto mt-3">
    <form action="">
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <div class="form-floating w-50 m-auto">
            <input type="email" class="form-control w-" id="email" placeholder="ingrese un correo">
            <label for="email"> Correo electronico</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="contrasenia" class="form-control" id="email" placeholder="ingrese su contraseña">
            <label for="contrasenia"> Contraseña</label>
        </div>

        <button class="w-50 btn btn-lg btn-primary m-auto mt-3">Entrar</button>
    </form>
    
</div>


@endsection