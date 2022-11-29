@extends('layouts.app')
@section('title', 'crear ejercicio')

@section('content')

<?php
$dias= array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
?>
<div class="row my-4">
    <div class="col">
        <h1 class="text-center">Asignar horario de entrenamientos</h1>
    </div>
</div>

@foreach ($errors->all() as $error)
        <p class="alert alert-danger m-auto w-50">
            {{$error}}
        </p>
        @endforeach
<div class="mx-5">

    @if($nivel === 'basico') <!--SI ES RUTINA NIVEL BASICO-->

    <div class="mt-3">
        <h3 class="text-center">Día 1</h3>
    </div>
    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index < 3)
                @if($entrenamiento->hora)
                <div class="col-4 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-4 p-3 mx-1 border rounded border-danger">
                @endif
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>

    <div class="mt-3">
        <h3 class="text-center">Día 2</h3>
    </div>
    <div class="d-flex flex-row mx-5  mt-3 rounded">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index > 2 && $loop->index < 6)
                @if($entrenamiento->hora)
                <div class="col-4 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-4 p-3 mx-1 border rounded border-danger">
                @endif
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>



    @elseif($nivel === 'medio') <!--SI ES RUTINA NIVEL MEDIO-->


    <div class="mt-3">
        <h3 class="text-center">Día 1</h3>
    </div>
    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index < 2)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>

    <div class="mt-3">
        <h3 class="text-center">Día 2</h3>
    </div>
    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index > 1 && $loop->index < 4)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>
    <div class="mt-3">
        <h3 class="text-center">Día 3</h3>
    </div>
    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index > 3 && $loop->index < 6)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>


    @else <!--SI ES RUTINA NIVEL ALTO-->

    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index < 2)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <h3 class="text-center">Día: {{$loop->index +1}}</h3>
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>

    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index > 1 && $loop->index < 4)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <h3 class="text-center">Día {{$loop->index +1}}</h3>
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>


    <div class="d-flex flex-row mx-5  mt-3">
        @foreach ($entrenamientos as $entrenamiento)
                @if($loop->index > 3 && $loop->index < 6)
                @if($entrenamiento->hora)
                <div class="col-6 p-3 mx-1 border rounded border-success">
                @else
                <div class="col-6 p-3 mx-1 border rounded border-danger">
                @endif
                    <h3 class="text-center">Día {{$loop->index +1}}</h3>
                    <form action="/entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="m-auto">
                                @if($entrenamiento->dia)
                                <label for="dia">Día: {{$dias[intval($entrenamiento->dia)]}}</label>
                                @else
                                <label for="dia">Día</label>
                                @endif
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
                                <label for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Agregue el numero de series" value="{{$entrenamiento->hora}}">
                            </div>
                        <button class="btn btn-lg btn-primary m-auto mt-3" style="display: block; font-size:16px;">Asignar</button>
                    </form>
                </div>
                @endif
        @endforeach
    </div>

    @endif
</div>



@endsection