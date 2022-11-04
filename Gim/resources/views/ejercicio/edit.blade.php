@extends('layouts.app')
 
@section('title', 'Editar Ejercicio')
@section('content')

<div class="form-group-class w-100 m-auto mt-3 ">
    <form action="/ejercicio/{{$ejercicio->Clave_Ejercicio}}" method = "POST">
    @csrf
    @method('put')
        <h1 class="h3 my-3 fw-normal text-center">Editar Ejercicio: {{$ejercicio->Descripcion_Ejercicio}}</h1>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="Descripcion_Ejercicio" name = "Descripcion_Ejercicio"  value = "{{$ejercicio->Descripcion_Ejercicio}}" placeholder="">
            <label for="Descripcion_Ejercicio"> Descripción del ejercicio</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="Series_Ejercicio" name = "Series_Ejercicio" value = "{{$ejercicio->Series_Ejercicio}}" placeholder="">
            <label for="Series_Ejercicio">Numero de Series</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="Repeticiones_Ejercicio" name = "Repeticiones_Ejercicio" value = "{{$ejercicio->Repeticiones_Ejercicio}}" placeholder="">
            <label for="Repeticiones_Ejercicio">Numero de Repeticiones</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <select name="recurso" id="recurso" class= "form-control w-">
                <option value="">Ninguno</option>
                @foreach($recursos as $recurso)
                <option value="{{$recurso->Clave_Recurso}}">{{$recurso->Nombre_Recurso}}</option>
                @endforeach
            </select>
            <label for="recurso">Recurso utilizado</label>
        </div>
        <div class= "row justify-content-center w-50 m-auto">
            <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto mt-3 mr-1" >Guardar Cambios</button>
            <a href="/ejercicio" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
        </div>
        
        
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