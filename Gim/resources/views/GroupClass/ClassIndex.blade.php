@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Clases Grupales</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/group_class/create">Nueva clase grupal</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <td>Nombre clase</td>
                <td>Descripción</td>
                <td>Cupos</td>
                <td>Horario</td>
                <td>Duracion (minutos)</td>
                <td>Entrenador</td>
            </tr>
            @foreach($clases as $clase)
            
            <tr>
                <td>{{ $clase->Nombre_Clase }}</td>
                <td>{{ $clase->Descripcion_Clase }}</td>
                <td>{{ $clase->Cupos_Clase }}</td>
                <td>{{ $clase->Horario_Clase }}</td>
                <td>{{ $clase->Duracion }}</td>
                <td>{{ $clase->entrenador->Nombre_Entrenador ?? 'None'}}</td>
                <td><a class="btn btn-outline-primary btn-sm" href="group_class/{{$clase->Clave_Clase}}/edit" role="button">Editar</a></td>
            </tr>
           @endforeach 
        </table>
    </div>
</div>
@endsection