@extends('layouts.app')
@section('title', 'Rutinas')

@section('content')

<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">

    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Rutinas</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-4 ml-5 mb-3">
            <a class="btn btn-primary btn-sm p-2" href="/rutinas/create">Crear nueva rutina</a>
        </div>
    </div>

    <div class="row px-5">
        <div class="col-md-12">
            @if(session('error'))
                <div class="alert alert-{{session('tipo')}}" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID Rutina:</th>
                    <th scope="col">Objetivo:</th>
                    <th scope="col">Nivel:</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($rutinas as $rutina)
                        <tr>
                            <td>{{$rutina->Clave_Rutina}}</td>
                            <td>{{$rutina->Objetivo}}</td>
                            <td>{{$rutina->nivel}}</td>
                            <td><a class="btn btn-outline-primary btn-sm" href="/rutinas/{{$rutina->Clave_Rutina}}/edit" role="button">Editar</a></td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{$rutina->Clave_Rutina}}" id ="btn-delete">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            
                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Rutina: {{$rutina->Clave_Rutina}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>¿Estás seguro que deseas eliminar esta rutina?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <form action="ejercicio/{{$rutina->Clave_Rutina}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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

        modalTitle.textContent = `Eliminar Rutina: ${recipient}`
        modalFooterForm.setAttribute('action',`rutinas/${recipient}`)
    })
</script>

@endsection