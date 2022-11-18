@extends('layouts.app')
 
@section('title', 'Valoración')
@section('content')

<div class="form-group-class w-100 m-auto mt-3 ">
    <form action="/cliente/{{$cliente->Clave_Cliente}}" method = "POST">
    @csrf
    @method('put')
        <h1 class="h3 my-3 fw-normal text-center">Valoración : {{$cliente->Nombre_Cliente}}</h1>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="Peso_Cliente" name = "Peso_Cliente"  value = "{{$cliente->Peso_Cliente}}" placeholder="">
            <label for="Peso_Cliente">Peso en kilogramos: </label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="Estatura_Cliente" name = "Estatura_Cliente" value = "{{$cliente->Estatura_Cliente}}" placeholder="">
            <label for="Estatura_Cliente">Estatura en metros: </label>
        </div>

        <div class="form-floating w-50 m-auto">
            <select name="Objetivos_Cliente" id="Objetivos_Cliente" class= "form-control w-">
                <option value="">Ninguno</option>
                <option value="Construir Musculo">Construir musculo</option>
                <option value="Perder grasa">Perder Grasa</option>
                <option value="Ganar musculo">Ganar musculo</option>
                <option value="Perder peso">Perder peso</option>
                <option value="Mejorar el rendimiento">Mejorar el rendimiento</option>
            </select>
            <label for="Objetivos_Cliente">Objetivo: </label>
        </div>

        <div class= "row justify-content-center w-50 m-auto">
            <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto mt-3 mr-1" >Guardar Cambios</button>
            <a href="/cliente" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
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