@extends('layouts.app')
@section('title', 'asignar entrenamiento')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Nuevo ejercicio</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6">
        <a class="btn btn-secondary mb-3" href="/entrenamiento">Back</a>
        <form action="/entrenamiento" method="POST">
            @csrf
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
            <div class=" m-auto mt-2">
                <label for="cliente">Cliente</label>
                <select name="cliente" id="cliente" class= "form-control">
                    @foreach($clientes as $cliente)
                    <option value="{{$cliente->Nombre_Cliente}}">{{$recurso->Nombre_Recurso}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" m-auto mt-2">
                <label for="rutina">Rutina</label>
                <select name="rutina" id="rutina" class= "form-control">
                    <option value="">Ninguno</option>
                    @foreach($rutinas as $rutina)
                    <option value="{{$rutina->Clave_Rutina}}">Objetivo: {{$rutina->Objetivo}}, Nivel: {{$rutina->nivel}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar Entrenamiento</button>
        </form>
    </div>
</div>
@endsection