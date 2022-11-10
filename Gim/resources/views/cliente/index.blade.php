@extends('layouts.app')
@section('title', 'Ejercicios')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Clientes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4 ml-5 mb-3">
            <a href="/entrenamiento/create" class="btn btn-primary btn-sm p-2">Asignar entrenamiento</a>
        </div>
    </div>

    <div class="row px-5">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->Clave_Cliente}}</td>
                    <td>{{$cliente->Nombre_Cliente}}</td>
                    <td>{{$cliente->Edad_ACliente }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/cliente/{{$cliente->Clave_Cliente}}/edit" role="button">Valoración</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection