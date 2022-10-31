@extends('recurso.layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Eliminar Recurso {{$recurso->Clave_Recurso}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/recursos">Regresar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/recursos/{{$recurso->Clave_Recurso}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
@endsection