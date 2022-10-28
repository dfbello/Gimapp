@extends('layouts.app')

@section('content2')

<div class="container">
        @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
    <form action="/Rutinas" method="POST">
    @csrf 

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

    <input type="submit" value="Crear Rutina" class="btn btn-primary">
    </form>
</div>
@endsection