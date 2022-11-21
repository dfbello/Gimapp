@extends('layouts.app')
@section('title', 'Entrenadores')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Entrenadores</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-4 ml-5 mb-3">
            <a class="btn btn-primary btn-sm p-2" href="/entrenador/create">Nuevo/a Entrenador</a>
        </div>
    </div>

    <div class="row px-5">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Edad</th>
                        <th>Horario</th>
                    </tr>
                </thead>
                @foreach ($entrenadores as $entrenador)
                <tr>
                    <td>{{$entrenador->Clave_Entrenador}}</td>
                    <td>{{$entrenador->Nombre_Entrenador}}</td>
                    <td>{{$entrenador->Descripcion_Entrenador}}</td>
                    <td>{{$entrenador->Edad_Entrenador}}</td>
                    <td>{{$entrenador->Horario_Entrenador}}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/entrenador/{{$entrenador->Clave_Entrenador}}/edit" role="button">Editar</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection