@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row form-signin w-100 m-auto mt-3">
    <form method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Sign in</h1>
        <div class="form-floating w-50 m-auto">
            <input type="email" class="form-control w-" id="email" name="email" placeholder="ingrese un correo" value="{{old('email')}}">
            <label for="email"> Correo electronico</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="email" class="form-control w-" id="email_confirmation" name="email_confirmation" placeholder="ingrese un correo" value="{{old('email')}}">
            <label for="email_confirmation"> Confirme su correo electronico</label>
        </div>
        
        <p class="text-danger">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </p>
       

        <button type="submit" class="w-50 btn btn-lg btn-primary mt-3 m-auto" style="display:block;">Entrar</button>
    </form>
    
</div>


@endsection