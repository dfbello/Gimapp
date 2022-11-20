@extends('layouts.app')
@section('title', 'Nuevo Recurso')
@section('content')

    <div class="form-group-class w-100 m-auto mt-3">
        <form action="/anuncios/{{$anuncio->Clave_Anuncio}}" method="POST">
            <h1 class="h3 my-3 fw-normal text-center">Editar Anuncio</h1>
            @csrf   
            @method('put')
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba un nombre" value="{{$anuncio->Nombre_Anuncio}}">
                <label for="nombre">Nombre:</label>
            </div>
            
            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripcion" value="{{$anuncio->Descripcion_Anuncio}}">
                <label for="descripcion">Descripción:</label>
            </div>    

            <div class="form-floating w-50 m-auto">
                <input type="text" class="form-control" id="folleto" name="folleto" placeholder="Escriba un enlace a folleto" value="{{$anuncio->Folleto_Anuncio}}">
                <label for="qr">Enlace a folleto:</label>
            </div>

            <div class= "row justify-content-center w-50 m-auto mt-3">
                <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Guardar Cambios</button>
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