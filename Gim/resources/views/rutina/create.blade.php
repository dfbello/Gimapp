@extends('layouts.app')
@section('title', 'Crear Rutina')

@section('content')

<div class="form-group-class w-100 m-auto px-5">
        
    <form action="/rutinas" method="POST">
    @csrf 
    <h1 class="h2 my-3 fw-normal text-center">Registrar Rutina</h1>

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

    <table class="table table-sm mt-3">
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

    <div class= "row justify-content-center w-100 m-auto mt-3">
        <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Registrar rutina</button>
        <a href="/rutinas" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
    </div>

    @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
    </form>
</div>
@endsection