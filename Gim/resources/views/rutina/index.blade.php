@extends('layouts.app')

@section('content2')

<div class="container">
    <div class="col-md-12">
        @if(session('error'))
            <div class="alert alert-{{session('tipo')}}" role="alert">
                {{session('error')}}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Rutina:</th>
                <th scope="col">Fecha:</th>
                <th scope="col">Hora:</th>
                <th scope="col">Cliente ID:</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($rutinas as $key => $rutina)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$rutina->Clave_Rutina}}</td>
                        <td>{{$rutina->Fecha_Rutina}}</td>
                        <td>{{$rutina->Hora_Rutina}}</td>
                        <td>{{$rutina->Clave_ClienteFK1}}</td>
                    </tr>
            @endforeach
        
            </tbody>
        </table>
    </div>
</div>

@endsection