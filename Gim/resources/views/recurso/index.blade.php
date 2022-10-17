@extends('recurso.layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Recursos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/recursos/create">Crear un nuevo recurso</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td>Clave</td>
                    <td>Tipo</td>
                    <td>Descripcion</td>
                    <td>QR</td>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                    <td>created_at</td>
                    <td>updated_at</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($recursos as $recurso)
                    <tr>
                        <td>{{$recurso->Clave_Recurso}}</td>
                        <td>{{$recurso->Tipo_Recurso}}</td>
                        <td>{{$recurso->Descripcion_Recurso}}</td>
                        <td>{{$recurso->QR_Recurso}}</td>
                        <td>{{$recurso->Nombre_Recurso}}</td>
                        <td>{{$recurso->Cantidad_Recurso}}</td>
                        <td>{{$recurso->created_at}}</td>
                        <td>{{$recurso->updated_at}}</td>
                        <td><a href="/recursos/{{$recurso->Clave_Recurso}}/edit">Editar</a></td>
                        <td><a href="/recursos/{{$recurso->Clave_Recurso}}/confirmDelete">Eliminar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection