@extends('layouts.app')
@section('title', 'Editar Rutina')

@section('content')

<div class="container bg-light mt-5 border rounded p-5 w-75 m-auto">
        @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
        <h1>Editar rutina {{$rutina->Clave_Rutina}}</h1>
    <form action="/rutinas/{{$rutina->Clave_Rutina}}" method="POST">
    @csrf 
    @method('put')
    <select name="Objetivo" id="Objetivo">
        <option value="" disabled selected hidden>Seleccione un objetivo</option>
            <option value="construir musculo">Construir musculo</option>>
            <option value="perder grasa">Perder grasa</option>>
            <option value="ganar musculo">Ganar musculo</option>>
            <option value="perder peso">Perder peso</option>>
            <option value="mejorar el rendimiento">Mejorar el rendimiento</option>>
    </select>


    <select name="nivel" id="nivel">
        <option value="" disabled selected hidden>Seleccione un nivel</option>
            <option value="basico">Basico</option>>
            <option value="medio">Medio</option>>
            <option value="alto">Alto</option>>
    </select>

    <br>

    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Series</th>
            <th scope="col">Repeticiones</th>
            <th scope="col">Seleccionar</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ejercicios as $ejercicio)
            <tr>
            <td>{{$ejercicio->Descripcion_Ejercicio}}</td>
            <td>{{$ejercicio->Series_Ejercicio}}</td>
            <td>{{$ejercicio->Repeticiones_Ejercicio}}</td>
            <td><input type="checkbox" name="seleccionado[]" value="{{$ejercicio->Clave_Ejercicio}}">
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class= "row justify-content-center m-auto">
        <button type= "submit" value="Editar" class=" w-50 btn btn-lg btn-primary m-auto mt-3 mr-1" >Guardar Cambios</button>
        <a href="/rutinas" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
    </div>
    </form>
</div>
@endsection