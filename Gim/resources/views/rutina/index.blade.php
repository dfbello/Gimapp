@extends('layouts.app')
@section('title', 'rutinas')

@section('content')

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
                <th scope="col">Objetivo:</th>
                <th scope="col">Nivel:</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($rutinas as $key => $rutina)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$rutina->Clave_Rutina}}</td>
                        <td>{{$rutina->Objetivo}}</td>
                        <td>{{$rutina->nivel}}</td>
                        <td>
                            <a  class="btn btn-outline-primary btn-xs btn-inline" href="/rutinas/{{$rutina->Clave_Rutina}}/edit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <form action="/rutinas/{{$rutina->Clave_Rutina}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-xs btn-inline">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        <a class="btn btn-primary" href="/rutinas/create">Crear nueva rutina</a>
        </div>
    </div>
</div>

@endsection