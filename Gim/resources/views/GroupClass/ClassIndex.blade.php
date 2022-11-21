@extends('layouts.app')
@section('title', 'Clases Grupales')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Clases grupales</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4 ml-5 mb-3">
            <a class="btn btn-primary btn-sm p-2" href="/group_class/create">Nueva clase grupal</a>
        </div>
    </div>

    <div class="row px-5">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre clase</th>
                        <th>Descripción</th>
                        <th>Cupos</th>
                        <th>Horario</th>
                        <th>Duracion (minutos)</th>
                        <th>Entrenador</th>
                    </tr>
                </thead>
                
                @foreach($clases as $clase)
                
                <tr>
                    <td>{{ $clase->Nombre_Clase }}</td>
                    <td>{{ $clase->Descripcion_Clase }}</td>
                    <td>{{ $clase->Cupos_Clase }}</td>
                    <td>{{ $clase->Horario_Clase }}</td>
                    <td>{{ $clase->Duracion }}</td>
                    <td>{{ $clase->entrenador->Nombre_Entrenador ?? 'None'}}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/group_class/{{$clase->Clave_Clase}}/edit" role="button">Editar</a></td>
                    <td><a id="apuntarse" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2" nombresito= "{{$clase->Nombre_Clase}}" data-bs-whatever="{{$clase->Clave_Clase}}" role="button">Apuntarse</a>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Apuntarse a: {{$clase->Nombre_Clase}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>{{$cliente->Nombre_Cliente}}, ¿Deseas inscribirte a esta clase?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="group_class/{{$clase->Clave_Clase}}/inscribirse" method="POST">
                                    @csrf
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </form>
                                    </div>
                                </div>
                                </div> 
                            </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" nombresito="{{$clase->Nombre_Clase}}" data-bs-whatever="{{$clase->Clave_Clase}}" id ="btn-delete">
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Clase: {{$clase->Nombre_Clase}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>¿Deseas eliminar esta clase?</p>
                                    <p>Esta acción no se puede deshacer</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="group_class/{{$clase->Clave_Clase}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
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
            const modalFooterForm = exampleModal.querySelector('.modal-footer form')
            
            modalTitle.textContent = `Eliminar Clase: ${nombre}`
            modalFooterForm.setAttribute('action',`group_class/${recipient}`)
        })

        const exampleModal2 = document.getElementById('exampleModal2')
        exampleModal2.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
            const button = event.relatedTarget
    // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            const nombre = button.getAttribute('nombresito')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
            const modalTitle = exampleModal2.querySelector('.modal-title')
            const modalFooterForm = exampleModal2.querySelector('.modal-footer form')
            
            modalTitle.textContent = `Eliminar Clase: ${nombre}`
            modalFooterForm.setAttribute('action',`group_class/${recipient}/inscribirse`)
        })
    </script>
</div>
@endsection