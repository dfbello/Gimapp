@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="form-signin w-100 m-auto mt-3">
    <form method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <div class="form-floating w-50 m-auto">
            <input type="email" class="form-control w-" id="email" name="email" placeholder="ingrese un correo" value="{{old('email')}}">
            <label for="email"> Correo electronico</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="password" class="form-control" id="password" name="password" placeholder="ingrese su contraseña">
            <label for="password"> Contraseña</label>
        </div>

        
        <p class="text-danger">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </p>
       

        <button type="submit" class="w-50 btn btn-lg btn-primary m-auto mt-3">Entrar</button>
    </form>
    
</div>


@endsection