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
            @foreach($rutina->ejercicios as $ejercicio)
                        <div class="col my-2 border rounded p-4 mr-2 " style="box-sizing: border-box; background-color:#86ced985;">
                            <p class="" style=""><strong>Ejercicio: </strong> {{$ejercicio->Nombre_Ejercicio}}</p>
                            <p class="" style=""><strong>Descripcion: </strong> {{$ejercicio->Descripcion_Ejercicio}}</p>
                            <p class="" style=""><strong>Zona trabajada: </strong> {{$ejercicio->Zona_Trabajada}}</p>
                            <p class="" style=""><strong>Series: </strong> {{$ejercicio->Series_Ejercicio}}</p>
                            <p class="" style=""><strong>Repeticiones: </strong> {{$ejercicio->Repeticiones_Ejercicio}}</p>
                            <iframe width="560" height="315" src="{{$ejercicio->Link_Ejercicio}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin:auto; display:block;"></iframe>
                        </div>
            @endforeach

    </div>


</div>


@endsection