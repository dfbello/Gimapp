@extends('layouts.app')
@section('title', 'Asignar Entrenamiento')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Asignar entrenamiento a {{$cliente->Nombre_Cliente}}</h1>
    </div>
</div>

@if($cliente->Objetivos_Cliente)
<div class="row justify-content-center px-5">
    <div class="col-6">
        <p class="" style="font-size: 25px; font-weight: lighter; ">
            <strong>Objetivo:</strong> {{$cliente->Objetivos_Cliente }}
        </p>
        <p class="" style="font-size: 25px; font-weight: lighter; ">
            <strong>Peso:</strong> {{$cliente->Peso_Cliente }} kg
        </p>
    </div>
    <div class="col-6" >
        <p class="" style="font-size: 25px; font-weight: lighter; ">
            <strong>Estatura:</strong> {{$cliente->Estatura_Cliente }} m
        </p>
        <p class="" style="font-size: 25px; font-weight: lighter; ">
            <strong>IMC: </strong> {{$cliente->IMC_Cliente}} @if($cliente->IMC_Cliente < 18.5)
            <a class="btn btn-secondary btn-sm">peso insuficiente</a>
            @elseif ($cliente->IMC_Cliente > 18.5 && $cliente->IMC_Cliente < 24.9)
            <a class="btn btn-success btn-sm">peso normal</a>
            @elseif ($cliente->IMC_Cliente > 25.0 && $cliente->IMC_Cliente < 29.9)
            <a class="btn btn-warning btn-sm">sobrepeso</a>
            @elseif ($cliente->IMC_Cliente >= 30.0)
            <a class="btn btn-danger btn-sm">obesidad</a>
            @endif
        </p>
    </div>
</div>
@else
    <div class="row">
        <div class="col">
            <p class="mx-5" style="font-size: 25px; font-weight: lighter; ">
                Requiere realizar valoración
            </p>
        </div>
    </div>
@endif


<div class="row justify-content-center">
    <div class="col-12 px-5">
        <a class="btn btn-secondary mb-3" href="/cliente">Back</a>
        <button type="button" class="btn btn-outline-danger btn-inline mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{$cliente->Clave_Cliente}}" id ="btn-delete">
            Eliminar antigua rutina cliente
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Antiguos entrenamientos del cliente {{$cliente->Nombre_Cliente}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p>Realize esta acción solo si el cliente requiere de nuevas rutinas de entrenamiento, no olvide asignar una rutina inmediatamente</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="/entrenamiento/{{$cliente->Clave_Cliente}}/eliminar" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </div>
            </div>
            </div> 
        </div>

        @if($cliente->Objetivos_Cliente)
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
        @endif
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
            const button = event.relatedTarget
    // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalFooterForm = exampleModal.querySelector('.modal-footer form')
        })
    </script>
@endsection