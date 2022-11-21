@extends('layouts.app')
@section('title', 'Registrar Entrenador')

@section('content')

<div class="form-signin w-100 m-auto mt-3 bg-light" style="height: 100vh;">
    <form action="/entrenador/{{$entrenador->Clave_Entrenador}}" method="POST">
        @csrf
        @method('put')
        <h1 class="h3 mb-3 fw-normal text-center">Editar Entrenador/a : {{$entrenador->Nombre_Entrenador}}</h1>
        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="name" name="name" placeholder="ingrese su nombre" value="{{$entrenador->Nombre_Entrenador}}" disabled>
            <label for="name"> Nombre</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="number" class="form-control" id="cedula" name="cedula" placeholder="ingrese su cedula" value="{{$entrenador->Clave_Entrenador}}">
            <label for="cedula"> Cedula</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="email" class="form-control" id="email" name="email" placeholder="ingrese su correo" value="{{$entrenador->Correo_Entrenador}}" disabled>
            <label for="email"> Correo</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="tel" class="form-control" id="celular" name="celular"placeholder="ingrese su numero celular" value="{{$entrenador->Telefono_Entrenador}}">
            <label for="celular"> Celular</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="ingrese su direccion" value="{{$entrenador->Direccion_Entrenador}}">
            <label for="direccion"> Dirección</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="ingrese su direccion" value="{{$entrenador->Descripcion_Entrenador}}">
            <label for="descripcion"> Descripción del entrenador</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="text" class="form-control" id="horario" name="horario" placeholder="ingrese su direccion" value="{{$entrenador->Horario_Entrenador}}">
            <label for="horario"> Horario de disponibilidad</label>
        </div>
        <div class="form-floating w-50 m-auto mt-2">
            <input type="number" class="form-control" id="edad" name="edad" placeholder="ingrese su Edad" value="{{$entrenador->Edad_Entrenador}}">
            <label for="edad"> Edad</label>
        </div>

        <div class= "row justify-content-center w-50 m-auto">
            <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto mt-3 mr-1" >Guardar Cambios</button>
            <a href="/entrenador" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
        </div>

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