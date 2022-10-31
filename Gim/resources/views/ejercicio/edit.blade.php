@extends('layouts.app')
@section('title', 'Editar Ejercicio')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Editar ejercicio {{$ejercicio->Clave_Ejercicio}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6">
        <a class="btn btn-secondary mb-3" href="/ejercicio">Back</a>
        <form action="/ejercicio/{{$ejercicio->Clave_Ejercicio}}" method="POST">
            @csrf
            @method('put')
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
                <div class="m-auto">
                    <label for="Descripcion_Ejercicio">Descripcion del Ejercicio</label>
                    <input type="text" class="form-control" id="Descripcion_Ejercicio" name="Descripcion_Ejercicio" placeholder="Agregue la Descripcion del Ejercicio" value="{{$ejercicio->Descripcion_Ejercicio}}">
                </div>
                <div class="m-auto mt-2">
                    <label for="Series_Ejercicio">Series del Ejercicio</label>
                    <input type="number" class="form-control" id="Series_Ejercicio" name="Series_Ejercicio" placeholder="Agregue el numero de series" value="{{$ejercicio->Series_Ejercicio}}">
                </div>
                <div class="m-auto mt-2">
                    <label for="Repeticiones_Ejercicio">Repeticiones del Ejercicio</label>
                    <input type="number" class="form-control" id="Repeticiones_Ejercicio" name="Repeticiones_Ejercicio" placeholder="Agregue el numero de repeticiones" value="{{$ejercicio->Repeticiones_Ejercicio}}">
                </div>
                <div class=" m-auto mt-2">
                    <label for="recurso ">Recurso utilizado</label>
                    <select name="recurso" id="recurso" class= "form-control">
                        <option value="">Ninguno</option>
                        @foreach($recursos as $recurso)
                        <option value="{{$recurso->Clave_Recurso}}">{{$recurso->Nombre_Recurso}}</option>
                        @endforeach
                    </select>
                </div>
            <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Registrar Ejercicio</button>
        </form>
    </div>
</div>
@endsection