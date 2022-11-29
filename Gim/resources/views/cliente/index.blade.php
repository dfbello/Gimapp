@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Clientes</h1>
        </div>
    </div>

    <!--<div class="row mx-5">
        <div class="col">
            <p class="text-light bg-success rounded p-3">Usuario creado con éxito</p>
        </div>
    </div>-->

    <div class="row mx-5 my-3">
        <div class="col-9">
            <form class="d-flex flex-row">
                <input type="text" class="form-control col-4 mx-1" id="name" name="name" placeholder="ingrese su nombre" value="{{old('name')}}">
                <input type="number" class="form-control col-4 mx-1" id="cedula" name="cedula" placeholder="ingrese su cedula" value="{{old('cedula')}}">
                <button type= "submit" class="btn btn-secondary col-4 mx-1">Buscar</button>
            </form>
        </div>
        <div class="col-3">
            <a class="w-100 btn btn-primary" href="/verificar">Verificar Membresia</a>
        </div>
    </div>

    
    @if($clientes)
    <div class="row px-5">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($clientes as $cliente)
                @if($cliente->Estado == 0)
                <tr class="alert alert-danger">
                @else
                <tr>  
                @endif
                    <td>{{$cliente->Clave_Cliente}}</td>
                    <td>{{$cliente->Nombre_Cliente}}</td>
                    <td>{{$cliente->Edad_ACliente }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/cliente/{{$cliente->Clave_Cliente}}/edit" role="button">Valoración</a></td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/cliente/{{$cliente->Clave_Cliente}}/asignarEntrenamiento" role="button">Asignar Entrenamiento</a></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm btn-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" nombresito="{{$cliente->Nombre_Cliente}}"  data-bs-whatever="{{$cliente->Clave_Cliente}}" id ="btn-delete">
                            Renovar Membresia
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Renovar membresia</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="renovarMembresia/{{$cliente->Clave_Cliente}}" method="POST">
                                        @csrf
                                        <div class="form-floating w-100 m-auto mt-2">
                                            <select class="form-control" name="plan" id="plan">
                                                <option value="anual">Anual</option>
                                                <option value="semestral">Semestral</option>
                                                <option value="trimestral">Trimestral</option>
                                                <option value="mensual">Mensual</option>
                                            </select>
                                            <label for="plan"> Selecione su plan</label>
                                        </div>
                                        <button type="submit" class="btn btn-success text-center">Renovar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                            </div> 
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @else
        <p class="text-info text-center" style="font-size: 20px">No se encontraron resultados</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
    const exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
        const button = event.relatedTarget
// Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const nombre = button.getAttribute('nombresito')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        modalTitle.textContent = `Revonvar membresia de ${nombre}`
        const modalFooterForm = exampleModal.querySelector('.modal-body form')
        modalFooterForm.setAttribute('action',`renovarMembresia/${recipient}`)
    })
</script>
@endsection