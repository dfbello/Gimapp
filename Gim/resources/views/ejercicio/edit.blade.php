@extends('layouts.app')
 
@section('title', 'Editar Ejercicio')
@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <form action="/ejercicio/{{$ejercicio->Clave_Ejercicio}}" method="POST">
            @csrf
            @method('put')
            <h1 class="h3 my-3 fw-normal text-center">Editar Ejercicio: {{$ejercicio->Nombre_Ejercicio}}</h1>
                <div class="form-floating m-auto">
                    <input type="text" class="form-control" id="Nombre_Ejercicio" name="Nombre_Ejercicio" placeholder="Type a title" value="{{$ejercicio->Nombre_Ejercicio}}">
                    <label for="Nombre_Ejercicio">Nombre del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <textarea class="form-control" id="Descripcion_Ejercicio" name="Descripcion_Ejercicio" placeholder="Type a title" value="{{$ejercicio->Descripcion_Ejercicio}}" rows="10" cols="40"> {{$ejercicio->Descripcion_Ejercicio}}</textarea>
                    <label for="Descripcion_Ejercicio">Descripcion del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <select name="zona" id="zona" class= "form-control">
                        <option value=""></option>
                        <option value="Brazo">Brazo</option>
                        <option value="Pierna">Pierna</option>
                        <option value="Pecho">Pecho</option>
                        <option value="Abdomen">Abdomen</option>
                        <option value="Espalda">Espalda</option>
                        <option value="Cardio">Cardio</option>
                    </select>
                    <label for="zona">Zona Trabajada</label>
                </div>
                <div class="form-floating m-auto">
                    <input type="number" class="form-control" id="Series_Ejercicio" name="Series_Ejercicio" placeholder="Type a cc" value="{{$ejercicio->Series_Ejercicio}}">
                    <label for="Series_Ejercicio">Numero de Series</label>
                </div>
                <div class="form-floating m-auto">
                    <input type="number" class="form-control" id="Repeticiones_Ejercicio" name="Repeticiones_Ejercicio" placeholder="Type a valor" value="{{$ejercicio->Repeticiones_Ejercicio}}">
                    <label for="Repeticiones_Ejercicio">Numero de Repeticiones</label>
                </div>
                <div class="form-floating m-auto">
                    <input type="text" class="form-control" id="Link_Ejercicio" name="Link_Ejercicio" placeholder="Type a title" value="{{$ejercicio->Link_Ejercicio}}">
                    <label for="Link_Ejercicio">Link del Ejercicio</label>
                </div>
                <div class="form-floating m-auto">
                    <select name="recurso" id="recurso" class= "form-control">
                        <option value="">Ninguno</option>
                        @foreach($recursos as $recurso)
                        <option value="{{$recurso->Clave_Recurso}}">{{$recurso->Nombre_Recurso}}</option>
                        @endforeach
                    </select>
                    <label for="recurso">Recurso utilizado</label>
                </div>
                <div class= "row justify-content-center m-auto mt-3">
                    <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Guardar Cambios</button>
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