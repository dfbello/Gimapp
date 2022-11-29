@extends('layouts.app')
@section('title', 'Rutina')

@section('content')

<div style="box-sizing:border-box;">
    
    <div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">Rutina </h1>
        </div>
    </div>

    <div class="row mx-5">
        <div class="col">
            <a class="btn btn-secondary" href="/perfil">Regresar</a>
        </div>
    </div>
    
    <div class="row justify-content-between mx-5">
        <div class="col-4 my-2">
            <h1 class=" fs-3 ">Ejercicios</h1>
        </div>
    </div>
    
    
    <div class="d-flex flex-row w-100">
        <div class="col-9">
            <div class="d-flex flex-column">
            @foreach($rutina->ejercicios as $ejercicio)
                    <div class="p-3 border m-2 text-bg-dark rounded-3">
                        <h4 class="text-primary fw-bold">{{$ejercicio->Nombre_Ejercicio}}</h4>
                        <div class="row justify-content-evenly">
                            <div class="col-md-3">
                                <p class="text-white">{{$ejercicio->Descripcion_Ejercicio}}</p>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Zona trabajada</th>
                                            <th class="text-primary">Series</th>
                                            <th class="text-primary">Repeticiones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-secondary">{{$ejercicio->Zona_Trabajada}}</td>
                                            <td class="text-secondary">{{$ejercicio->Series_Ejercicio}}</td>
                                            <td class="text-secondary">{{$ejercicio->Repeticiones_Ejercicio}}</td>
                                            <td>
                                                <a href="#myModal" class="btn btn-sm btn-outline-light" data-toggle="modal">Video</a>
                                            
                                                <!-- Modal HTML -->
                                                <div id="myModal" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{$ejercicio->Nombre_Ejercicio}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="{{$ejercicio->Link_Ejercicio}}" allowfullscreen></iframe>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="/recursos/{{$ejercicio->Clave_RecursoFK1}}" class="btn btn-sm btn-outline-light">Uso</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            @endforeach
            </div>
        </div>



        <div class="col-3">
            <div class="w-100 h-100 p-4 text-bg-dark rounded-3 m-0">
                <h6 class="text-primary">Informacion sobre la rutina</h6>
                <div class="row justify-between">
                    <div class="col">
                        <p class="text-secondary">Objetivo:</p>
                    </div>
                    <div class="col">
                        <p class= text-light>{{$rutina->Objetivo}}</p>
                    </div>
                </div>
                <div class="row justify-between">
                    <div class="col">
                        <p class="text-secondary">Nivel:</p>
                    </div>
                    <div class="col">
                        <p class= text-light>{{$rutina->nivel}}</p>
                    </div>
                </div>
                <div class="row justify-between">
                    <div class="col">
                        <p class="text-secondary">No. de ejercicios:</p>
                    </div>
                    <div class="col">
                        <p class= text-light>{{$rutina->ejercicios->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .bs-example{
    	margin: 20px;
    }
    .modal-dialog iframe{
        margin: 0 auto;
        display: block;
    }
</style>
<script>
    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#cartoonVideo").attr('src');
        
        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#myModal").on('hide.bs.modal', function(){
            $("#cartoonVideo").attr('src', '');
        });
        
        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            $("#cartoonVideo").attr('src', url);
        });

    }
</script>

@endsection