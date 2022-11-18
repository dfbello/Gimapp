@extends('layouts.app')
@section('title', 'Rutina')

@section('content')

<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Rutina</h1>
        </div>
    </div>

    <div class="row justify-content-center mx-5">
        <div class="col-4 my-3">
            <p class="" style="font-size: 25px; font-weight: lighter; ">
                <strong>Objetivo:</strong> {{$rutina->Objetivo }}
            </p>
        </div>

        <div class="col-4 my-3">
            <p class="" style="font-size: 25px; font-weight: lighter; ">
                <strong>Nivel:</strong> {{$rutina->nivel }}
            </p>
        </div>
    </div>

    <hr style="width: 90%; margin:10px auto 20px auto; ">

    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Ejercicios</h1>
        </div>
    </div>

    <div class="row justify-content-center mx-5">
            @foreach($asignados as $asignado)
                @foreach($ejercicios as $ejercicio)
                    @if($ejercicio->Clave_Ejercicio === $asignado->Clave_EjercicioFK2)
                        <div class="col-5 my-2 border border-info rounded p-4 mr-2" style="box-sizing: border-box;">
                            <p class="" style="font-size: 25px; font-weight: lighter; "><strong>Ejercicio: </strong> {{$ejercicio->Descripcion_Ejercicio}}</p>
                            <p class="" style="font-size: 25px; font-weight: lighter; "><strong>Series: </strong> {{$ejercicio->Series_Ejercicio}}</p>
                            <p class="" style="font-size: 25px; font-weight: lighter; "><strong>Repeticiones: </strong> {{$ejercicio->Repeticiones_Ejercicio}}</p>
                        </div>
                    @endif          
                @endforeach
            @endforeach
    </div>


</div>


@endsection