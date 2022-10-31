@extends('layouts.app')
@section('title', 'Nuevo Recurso')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Nuevo Recurso</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/recursos">Regresar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/recursos" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Escriba un tipo" value="{{old('tipo')}}">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción" value="{{old('descripcion')}}">
                    <label for="qr">Enlace QR:</label>
                    <input type="text" class="form-control" id="qr" name="qr" placeholder="Escriba un enlace" value="{{old('qr')}}">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba un nombre" value="{{old('nombre')}}">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Escriba una cantidad" min="0" value="{{old('cantidad')}}">
                </div>
                <button class="btn btn-primary" type="submit">Registrar</button>
            </form>
        </div>
    </div>
@endsection