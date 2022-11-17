@extends('layouts.app')
@section('title', 'Asignar Entrenamiento')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Asignar entrenamiento a {{$cliente->Nombre_Cliente}}</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 px-5">
        <a class="btn btn-secondary mb-3" href="/entrenamiento">Back</a>

        <form> 
            <select name="objetivo" id="objetivo" class="form-control col-4 d-inline">
                <option value="" disabled selected hidden>Seleccione un objetivo</option>
                    <option value="construir musculo">Construir musculo</option>>
                    <option value="perder grasa">Perder grasa</option>>
                    <option value="ganar musculo">Ganar musculo</option>>
                    <option value="perder peso">Perder peso</option>>
                    <option value="mejorar el rendimiento">Mejorar el rendimiento</option>>
            </select>
        
            <select name="nivel" id="nivel" class="form-control col-4 d-inline">
                <option value="" disabled selected hidden>Seleccione un nivel</option>
                    <option value="basico">Basico</option>>
                    <option value="medio">Medio</option>>
                    <option value="alto">Alto</option>>
            </select>

            <input type="checkbox" name="ambos" value="ambos">
            <label for="ambos">Ambos criterios</label>

            <button type= "submit" class="w-25 btn btn-secondary d-inline" >Filtrar</button>
        </form>

        <form action="/entrenamiento" method="POST">
            @csrf
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
            <div class=" m-auto mt-2" style="display: none;">
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" value="{{$cliente->Clave_Cliente}}">
            </div>
            <div class=" m-auto mt-2 mb-3">
                <table class="table table-sm mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Rutina</th>
                        <th scope="col">Objetivo</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rutinas as $rutina)
                        <tr>
                        <td>{{$rutina->Clave_Rutina }}</td>
                        <td>{{$rutina->Objetivo}}</td>
                        <td>{{$rutina->nivel}}</td>
                        <td><input type="checkbox" name="seleccionado[]" value="{{$rutina->Clave_Rutina}}">
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($rutinas)

                @else
                    <p class="text-info text-center" style="font-size: 20px">No se encontraron resultados</p>
                @endif
            </div>
            <button class="btn btn-lg btn-primary m-auto" style="display: block; font-size:16px; margin-top: 10px;">Asignar Entrenamiento</button>
        </form>
    </div>
</div>
@endsection