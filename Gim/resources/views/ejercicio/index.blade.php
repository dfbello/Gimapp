@extends('layouts.app')
@section('title', 'perfil')

@section('content')
<div class="bg-light mt-5 border rounded p-5 w-75 m-auto">
<div class="row justify-content-center mx-5">
    <div class="col-8 mb-3">
        <h1 class="text-center">Ejercicios</h1>
    </div>
</div>
<div>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td>Id</td>
                    <td>Descripción</td>
                    <td>Series</td>
                    <td>Repeticiones</td>
                    <td>Recurso</td>
                </tr>
                @foreach ($ejercicios as $ejercicio)
                <tr>
                    <td>{{$ejercicio->Clave_Ejercicio }}</td>
                    <td>{{$ejercicio->Descripcion_Ejercicio }}</td>
                    <td>{{$ejercicio->Series_Ejercicio	 }}</td>
                    <td>{{$ejercicio->Repeticiones_Ejercicio }}</td>
                    <td>{{$ejercicio->Clave_RecursoFK1}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

    
    


@endif
@endsection