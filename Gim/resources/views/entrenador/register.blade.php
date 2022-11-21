@extends('layouts.app')
@section('title', 'Registrar Entrenador')

@section('content')

<div class="form-signin w-100 m-auto mt-3 bg-light" style="height: 100vh;">
    <form action="/entrenador/" method="POST">
        @csrf

        <h1 class="h3 mb-3 fw-normal text-center">Registro de Entrenador</h1>
        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="name" name="name" placeholder="ingrese su nombre" value="{{old('name')}}">
            <label for="name"> Nombre</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="number" class="form-control" id="cedula" name="cedula" placeholder="ingrese su cedula" value="{{old('cedula')}}">
            <label for="cedula"> Cedula</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="email" class="form-control" id="email" name="email" placeholder="ingrese su correo" value="{{old('email')}}">
            <label for="email"> Correo</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="tel" class="form-control" id="celular" name="celular"placeholder="ingrese su numero celular" value="{{old('celular')}}">
            <label for="celular"> Celular</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="ingrese su direccion" value="{{old('direccion')}}">
            <label for="direccion"> Dirección</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="direccion" name="descripcion" placeholder="ingrese su direccion" value="{{old('direccion')}}">
            <label for="descripcion"> Descripción del entrenador</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="direccion" name="horario" placeholder="ingrese su direccion" value="{{old('direccion')}}">
            <label for="horario"> Horario de disponibilidad</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="number" class="form-control" id="edad" name="edad" placeholder="ingrese su Edad" value="{{old('edad')}}">
            <label for="edad"> Edad</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="password" class="form-control" id="password" name="password" placeholder="ingrese su contraseña">
            <label for="password"> Contraseña</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="ingrese su contraseña">
            <label for="password_confirmation"> Confirme su contraseña</label>
        </div>

        <button type="submit" class="w-50 btn btn-lg btn-primary m-auto mt-3" style="display: block">Registrar</button>

        @if($errors->any())
            <div class="alert alert-danger w-50 m-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class = "text-left">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        
    </form>
    
</div>

@endsection