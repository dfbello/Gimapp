@extends('layouts.app')
@section('title', 'crear ejercicio')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Asignar horario de entrenamientos</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6">
        <a class="btn btn-secondary mb-3" href="/perfil">Back</a>
        @foreach($entrenamientos as $entrenamiento)
        <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
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
                <div>
                    <h3>Día: {{($loop->index)+1}}</h3>
                </div>
                <div class="m-auto">
                    <label for="dia">Día</label>
                    <select name="dia" id="dia" class= "form-control">
                        <option value="">Ninguno</option>
                        <option value="1">lunes</option>
                        <option value="2">martes</option>
                        <option value="3">miércoles</option>
                        <option value="4">jueves</option>
                        <option value="5">viernes</option>
                        <option value="6">sábado</option>
                        <option value="0">domingo</option>
                    </select>
                </div>
                <div class="m-auto mt-2">
                    <label for="hora">Series del Ejercicio</label>
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                </div>
            <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
        </form>
        @endforeach
    </div>
</div>
@endsection