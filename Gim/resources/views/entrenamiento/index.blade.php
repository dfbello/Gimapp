@extends('layouts.app')
@section('title', 'Entrenamientos')

@section('content')
<div class="bg-light mt-5 border rounded p-5 w-75 m-auto">
<div class="row justify-content-center mx-5">
    <div class="col-8 mb-3">
        <h1 class="text-center">Entrenamientos</h1>
    </div>
</div>
<div class=row>
    <div class="col">
        <a href="/entrenamiento/create" class="btn btn-primary">Asignar entrenamiento</a>
    </div>
</div>
<div>
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td>Id</td>
                    <td>Cliente</td>
                    <td>Rutina id</td>
                    <td>Hora</td>
                    <td>Fecha</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
                @foreach ($entrenamientos as $entrenamiento)
                <tr>
                    <td>{{$entrenamiento->Clave_Entrenamiento}}</td>
                    <td>{{$entrenamiento->cliente->Nombre_Cliente}}</td>
                    <td>{{$entrenamiento->Clave_RutinaFK2}}</td>
                    <td>{{$entrenamiento->hora}}</td>
                    <td>{{$entrenamiento->fecha}}</td>
                    <td><a href="entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}/edit" id="btn-edit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                      </svg></a></td>
                    <td>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{$entrenamiento->Clave_Entrenamiento}}" id ="btn-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                    
                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar entrenamiento: {{$entrenamiento->Clave_Entrenamiento}}</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>¿Estás seguro que deseas eliminar este entrenamiento?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                  <form action="entrenamiento/{{$entrenamiento->Clave_Entrenamiento}}" method="POST">
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

        modalTitle.textContent = `Eliminar Entrenamiento: ${recipient}`
        modalFooterForm.setAttribute('action',`entrenamiento/${recipient}`)
    })
</script>

@endsection