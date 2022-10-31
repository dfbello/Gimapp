@extends('layouts.app')
@section('title', 'Ejercicios')

@section('content')
<div class="bg-light mt-5 border rounded p-5 w-75 m-auto">
<div class="row justify-content-center mx-5">
    <div class="col-8 mb-3">
        <h1 class="text-center">Ejercicios</h1>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <a href="/ejercicio/create" class="btn btn-primary">Crear nuevo ejercicio</a>
    </div>
</div>
<div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Recurso</th>
                        <th>Descripción</th>
                        <th>Series</th>
                        <th>Repeticiones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($ejercicios as $ejercicio)
                <tr>
                    <td>{{$ejercicio->Clave_Ejercicio}}</td>
                    <td>{{$ejercicio->recurso->Nombre_Recurso ?? 'Ninguno'}}</td>
                    <td>{{$ejercicio->Descripcion_Ejercicio }}</td>
                    <td>{{$ejercicio->Series_Ejercicio	 }}</td>
                    <td>{{$ejercicio->Repeticiones_Ejercicio }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="ejercicio/{{$ejercicio->Clave_Ejercicio}}/edit" role="button">Editar</a></td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm btn-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{$ejercicio->Clave_Ejercicio}}" id ="btn-delete">
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Ejercicio: {{$ejercicio->Clave_Ejercicio}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p>¿Estás seguro que deseas eliminar este ejercicio?</p>
                                <p>Recuerda que eliminar este ejercicio, lo eliminará de todas las rutinas en las que esté</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <form action="ejercicio/{{$ejercicio->Clave_Ejercicio}}" method="POST">
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
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalFooterForm = exampleModal.querySelector('.modal-footer form')

            modalTitle.textContent = `Eliminar Ejercicio: ${recipient}`
            modalFooterForm.setAttribute('action',`ejercicio/${recipient}`)
        })
    </script>

@endsection