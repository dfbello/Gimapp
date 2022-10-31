@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Clases Grupales</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/group_class/create">Nueva clase grupal</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <td>Nombre clase</td>
                <td>Descripción</td>
                <td>Cupos</td>
                <td>Horario</td>
                <td>Duracion (minutos)</td>
                <td>Entrenador</td>
            </tr>
            @foreach($clases as $clase)
            
            <tr>
                <td>{{ $clase->Nombre_Clase }}</td>
                <td>{{ $clase->Descripcion_Clase }}</td>
                <td>{{ $clase->Cupos_Clase }}</td>
                <td>{{ $clase->Horario_Clase }}</td>
                <td>{{ $clase->Duracion }}</td>
                <td>{{ $clase->entrenador->Nombre_Entrenador ?? 'None'}}</td>
                <td><a class="btn btn-outline-primary btn-sm" href="group_class/{{$clase->Clave_Clase}}/edit" role="button">Editar</a></td>
                <td>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{$clase->Clave_Clase}} {{$clase->Nombre_Clase}}" id ="btn-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
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
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalFooterForm = exampleModal.querySelector('.modal-footer form')
        modalFooterForm.setAttribute('action',`group_class/${recipient}`)
    })
</script>
@endsection