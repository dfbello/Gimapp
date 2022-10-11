@extends('layouts.app')
@section('title', 'perfil')

@section('content')
<h1 class="">Welcome to GimApp PERRO</h1>
@if (Auth::user())
    <p>HOLA: {{Auth::user()->name}}</p>
@endif
@endsection