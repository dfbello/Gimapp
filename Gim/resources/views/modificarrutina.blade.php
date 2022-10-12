@extends('layouts.app')

@section('content2')

<div class="container">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">ID: {{$id}} Cliente: {{$rutina[0]->Clave_ClienteFK1}} Fecha: {{$rutina[0]->Fecha_Rutina}} Hora: {{$rutina[0]->Hora_Rutina}}</div>

            <div class="card-body">
                <form action="{{route('actualizarRutina',$id)}}" method="POST">
                    @csrf
                    @method("PATCH")



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
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
            </div>
    </div>
</div>

@endsection