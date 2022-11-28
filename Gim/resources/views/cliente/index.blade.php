@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Clientes</h1>
        </div>
    </div>

    <!--<div class="row mx-5">
        <div class="col">
            <p class="text-light bg-success rounded p-3">Usuario creado con éxito</p>
        </div>
    </div>-->

    <div class="row mx-5 my-3">
        <div class="col">
            <form class="d-flex flex-row">
                <input type="text" class="form-control col-4 mx-1" id="name" name="name" placeholder="ingrese su nombre" value="{{old('name')}}">
                <input type="number" class="form-control col-4 mx-1" id="cedula" name="cedula" placeholder="ingrese su cedula" value="{{old('cedula')}}">
                <button type= "submit" class="btn btn-secondary col-4 mx-1">Filtrar</button>
            </form>
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
                        <th></th>
                    </tr>
                </thead>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->Clave_Cliente}}</td>
                    <td>{{$cliente->Nombre_Cliente}}</td>
                    <td>{{$cliente->Edad_ACliente }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/cliente/{{$cliente->Clave_Cliente}}/edit" role="button">Valoración</a></td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/cliente/{{$cliente->Clave_Cliente}}/asignarEntrenamiento" role="button">Asignar Entrenamiento</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection