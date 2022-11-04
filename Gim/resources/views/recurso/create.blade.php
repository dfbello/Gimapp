@extends('layouts.app')
@section('title', 'Nuevo Recurso')
@section('content')

    <div class="form-group-class w-100 m-auto mt-3">
        <form action="/recursos" method="POST">
            <h1 class="h3 my-3 fw-normal text-center">Nuevo Recurso</h1>
            @csrf

            <div class="form-floating w-50 m-auto">
                <select name="tipo" id="tipo" value = "{{old('coach')}}" class= "form-control w-">
                    <option value="maquina">Maquina</option>
                    <option value="Recurso">Recurso</option>
                </select>
                <label for="tipo">Tipo</label>
            </div>
            
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción" value="{{old('descripcion')}}">
                <label for="descripcion">Descripción:</label>
            </div>

            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="qr" name="qr" placeholder="Escriba un enlace" value="{{old('qr')}}">
                <label for="qr">Enlace QR:</label>
            </div>
            
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba un nombre" value="{{old('nombre')}}">
                <label for="nombre">Nombre:</label>
            </div>
            
            <div class="form-floating w-50 m-auto">
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Escriba una cantidad" min="0" value="{{old('cantidad')}}">
                <label for="cantidad">Cantidad:</label>
            </div>    

            <div class= "row justify-content-center w-50 m-auto mt-3">
                <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Registrar recurso</button>
                <a href="/recursos" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
            </div>
           
           
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

@endsection