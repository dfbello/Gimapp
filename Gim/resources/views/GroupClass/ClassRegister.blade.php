@extends('layouts.app')
 
@section('title', 'clases')
@section('content')

<div class="form-group-class w-100 m-auto mt-3">
    <form action="/group_class" method = "POST">
    @csrf
        <h1 class="h3 mb-3 fw-normal">Registrar Clase Grupal</h1>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="nombre" name = "nombre"  placeholder="">
            <label for="nombre"> Nombre de la clase</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="descripcion" name = "descripcion" placeholder="">
            <label for="descripcion"> Descripción </label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="cupos" name = "cupos" placeholder="ingrese un correo">
            <label for="cupos">Cupos disponibles</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="datetime-local" class="form-control w-" id="datetime" name = "datetime" placeholder="ingrese un correo">
            <label for="datetime">Fecha y Hora de inicio</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="duracion" name = "duracion" placeholder="ingrese un correo">
            <label for="duracion">Duracion (minutos)</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <select name="coach" id="coach" class= "form-control w-">
                @foreach($Entrenadores as $entrenador)

                <option value="{{$entrenador -> Nombre_Entrenador}}">{{$entrenador -> Nombre_Entrenador}}</option>
                @endforeach
            </select>
            <label for="duracion">Entrenador asignado</label>
        </div>

        <button class="w-50 btn btn-lg btn-primary m-auto mt-3">Registrar clase</button>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    
    
</div>
    
@endsection