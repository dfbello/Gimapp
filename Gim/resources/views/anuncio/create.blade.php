@extends('layouts.app')
@section('title', 'Nuevo Recurso')
@section('content')

    <div class="form-group-class w-100 m-auto mt-3">
        <form action="/anuncios" method="POST">
            <h1 class="h3 my-3 fw-normal text-center">Nuevo Anuncio</h1>
            @csrf   
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba un nombre" value="{{old('nombre')}}">
                <label for="nombre">Nombre:</label>
            </div>
            
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripcion" value="{{old('descripcion')}}">
                <label for="descripcion">Descripción:</label>
            </div>    

            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="folleto" name="folleto" placeholder="Escriba un enlace a folleto" value="{{old('folleto')}}">
                <label for="qr">Enlace a folleto:</label>
            </div>

            <div class= "row justify-content-center w-50 m-auto mt-3">
                <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Registrar Anuncio</button>
                <a href="/anuncios" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
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