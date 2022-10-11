@extends('layouts.app')

@section('content2')

<div class="container">
        @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
    <form action="{{route('asignarRutina.store')}}" method="POST">
    @csrf 
    <input type="text" name="Clave_Rutina" id="Clave_Rutina" placeholder="ID">


    <input type="text" name="Fecha_Rutina" id="Fecha_Rutina" placeholder="Fecha">


    <input type="text" name="Hora_Rutina" id="Hora_Rutina" placeholder="Hora">



    <!--<input type="text" name="Clave_ClienteFK1" id="Clave_ClienteFK1">-->
    <select name="Clave_ClienteFK1" id="Clave_ClienteFK1" placeholder="Cliente">
        @foreach ($clientes as $cliente)
        <option value="" disabled selected hidden>Seleccione un cliente</option>
            <option value="{{ $cliente->Clave_Cliente }}">{{$cliente->Nombre_Cliente}}</option>>
        @endforeach
    </select>
    <br>

    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Series</th>
            <th scope="col">Repeticiones</th>
            <th scope="col">Seleccionar</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ejercicios as $ejercicio)
            <tr>
            <td>{{$ejercicio->Descripcion_Ejercicio}}</td>
            <td>{{$ejercicio->Series_Ejercicio}}</td>
            <td>{{$ejercicio->Repeticiones_Ejercicio}}</td>
            <td><input type="checkbox" name="seleccionado[]" value="{{$ejercicio->Clave_Ejercicio}}">
            </tr>
        @endforeach
        </tbody>
    </table>

    <input type="submit" value="Asignar" class="btn btn-primary">
    </form>
</div>
@endsection
