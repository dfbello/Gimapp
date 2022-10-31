@extends('layouts.app')
@section('title', 'Recursos')

@section('content')
    <div class="bg-light mt-5 border rounded p-5 w-75 m-auto">
    <div class="row justify-content-center mx-5">
        <div class="col-8 mb-3">
            <h1 class="text-center">Recursos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-sm" href="/recursos/create">Crear un nuevo recurso</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <tr>
                    <td>Clave</td>
                    <td>Tipo</td>
                    <td>Descripcion</td>
                    <td>QR</td>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                </tr>
                @foreach($recursos as $recurso)
                    <tr>
                        <td>{{$recurso->Clave_Recurso}}</td>
                        <td>{{$recurso->Tipo_Recurso}}</td>
                        <td>{{$recurso->Descripcion_Recurso}}</td>
                        <td>{{$recurso->QR_Recurso}}</td>
                        <td>{{$recurso->Nombre_Recurso}}</td>
                        <td>{{$recurso->Cantidad_Recurso}}</td>
                        <td><a class="btn btn-outline-primary btn-sm" href="/recursos/{{$recurso->Clave_Recurso}}/edit" role="button">Editar</a></td>
                        <td><a href="/recursos/{{$recurso->Clave_Recurso}}/confirmDelete">Eliminar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection