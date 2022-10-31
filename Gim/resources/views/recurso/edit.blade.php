@extends('layouts.app')
@section('title', 'Editar Recurso')
@section('content')


<div class="form-group-class w-100 m-auto mt-3">
    <form action="/recursos/{{$recurso->Clave_Recurso}}" method = "POST">
    @csrf
    @method('put')
        <h1 class="h3 mb-3 fw-normal text-center">Editar Recurso {{$recurso->Nombre_Recurso}}</h1>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="tipo" name = "tipo"  value = "{{$recurso->Tipo_Recurso}}" placeholder="">
            <label for="tipo"> Tipo</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="descripcion" name = "descripcion" value = "{{$recurso->Descripcion_Recurso}}" placeholder="">
            <label for="descripcion"> Descripción</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="qr" name = "qr"  value = "{{$recurso->QR_Recurso}}" placeholder="">
            <label for="qr"> Enlace QR</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="text" class="form-control w-" id="nombre" name = "nombre" value = "{{$recurso->Nombre_Recurso}}" placeholder="">
            <label for="nombre"> Nombre</label>
        </div>

        <div class="form-floating w-50 m-auto">
            <input type="number" class="form-control w-" id="cantidad" name = "cantidad" value = "{{$recurso->Cantidad_Recurso}}" placeholder="ingrese un correo">
            <label for="cantidad">Cantidad</label>
        </div>


        
        <div class= "row justify-content-center w-50 m-auto">
            <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto mt-3 mr-1" >Guardar Cambios</button>
            <a href="/group_class" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Descartar Cambios</a>
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
    
@endsection