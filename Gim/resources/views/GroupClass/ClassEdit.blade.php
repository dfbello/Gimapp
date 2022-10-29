@extends('layouts.app')
 
@section('title', 'clases')
@section('content')

<div class="form-group-class w-100 m-auto mt-3">
    <form action="/group_class/{{$clase->Clave_Clase}}" method = "POST">
    @csrf
    @method('put')
        <h1 class="h3 mb-3 fw-normal">Editar Clase  {{$clase->Nombre_Clase}}</h1>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="nombre" name = "nombre"  value = "{{$clase->Nombre_Clase}}" placeholder="">
            <label for="nombre"> Nombre de la clase</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="descripcion" name = "descripcion" value = "{{$clase->Descripcion_Clase}}" placeholder="">
            <label for="descripcion"> Descripción </label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="cupos" name = "cupos" value = "{{$clase->Cupos_Clase}}" placeholder="ingrese un correo">
            <label for="cupos">Cupos disponibles</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="datetime-local" class="form-control w-" id="datetime" name = "datetime" value = "{{$clase->Horario_Clase}}" placeholder="ingrese un correo">
            <label for="datetime">Fecha y Hora de inicio</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="duracion" name = "duracion" value = "{{$clase->Duracion}}" placeholder="ingrese un correo">
            <label for="duracion">Duracion (minutos)</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <select name="coach" id="coach" value = "{{old('coach')}}" class= "form-control w-">
                @foreach($Entrenadores as $entrenador)

                <option value="{{$entrenador -> Clave_Entrenador}}">{{$entrenador -> Nombre_Entrenador}}</option>
                @endforeach
            </select>
            <label for="duracion">Entrenador asignado</label>
        </div>

        <button type= "submit" class="w-25 btn btn-lg btn-primary m-auto mt-3">Guardar Cambios</button>
        <a href="/group_class" class="w-25 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
        
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