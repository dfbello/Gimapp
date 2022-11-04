@extends('layouts.app')
@section('title', 'Nuevo Ejercicio')

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <form action="/ejercicio" method="POST">
            @csrf
            <h1 class="h3 my-3 fw-normal text-center">Registrar Ejercicio</h1>
                <div class="form-floating m-auto">
                    <input type="text" class="form-control" id="Descripcion_Ejercicio" name="Descripcion_Ejercicio" placeholder="Type a title" value="{{old('Descripcion_Ejercicio')}}">
                    <label for="Descripcion_Ejercicio">Descripcion del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <input type="number" class="form-control" id="Series_Ejercicio" name="Series_Ejercicio" placeholder="Type a cc" value="{{old('Series_Ejercicio')}}">
                    <label for="Series_Ejercicio">Series del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <input type="number" class="form-control" id="Repeticiones_Ejercicio" name="Repeticiones_Ejercicio" placeholder="Type a valor" value="{{old('Repeticiones_Ejercicio')}}">
                    <label for="Repeticiones_Ejercicio">Repeticiones del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <select name="recurso" id="recurso" class= "form-control">
                        <option value="">Ninguno</option>
                        @foreach($recursos as $recurso)
                        <option value="{{$recurso->Clave_Recurso}}">{{$recurso->Nombre_Recurso}}</option>
                        @endforeach
                    </select>
                    <label for="recurso ">Recurso utilizado</label>
                </div>
                <div class= "row justify-content-center m-auto mt-3">
                    <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Registrar ejercicio</button>
                    <a href="/ejercicio" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
                </div>

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
        </form>
    </div>
</div>
@endsection