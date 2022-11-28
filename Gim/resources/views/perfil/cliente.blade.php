@extends('layouts.app')
@section('title', 'perfil')

@section('content')
<div class="bg-light border rounded w-100 m-auto h-100" style="box-sizing: border-box;">
<div class="row justify-content-center mx-5 mt-5">
    <div class="col-12 mb-3">
        <h1 class="text-left">Tus datos personales</h1>
    </div>
</div>
@if (Auth::user())
    <div class="row justify-content-center px-5">
        <div class="col-6" >
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg> {{$cliente->Nombre_Cliente }}
            </p>
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                  </svg> {{$cliente->Telefono_Cliente }}
            </p>
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg> {{$cliente->Direccion_Cliente }}
            </p>
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                  </svg> {{$cliente->Correo_Cliente}}
            </p>

        </div>
        <div class="col-6">
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hourglass" viewBox="0 0 16 16">
                    <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2h-7z"/>
                  </svg> {{$cliente->Edad_ACliente}}
            </p>
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                  </svg> {{$cliente->Suscripcion_Cliente}}
            </p>
            <p class="" style="font-size: 25px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                  </svg> {{$cliente->Clave_Cliente}}
            </p>
            @if($cliente->Suscripcion_Cliente === 'mensual')
            <p class="" style="font-size: 25px;">
                Membresia vence en: {{date("d-m-Y",strtotime(($cliente->Fecha_Pago_Cliente)."+ 1 month"))}}
            </p>
            @elseif($cliente->Suscripcion_Cliente === 'trimestral')
            <p class="" style="font-size: 25px;">
                Membresia vence en: {{date("d-m-Y",strtotime(($cliente->Fecha_Pago_Cliente)."+ 3 month"))}}
            </p>
            @elseif($cliente->Suscripcion_Cliente === 'semestral')
            <p class="" style="font-size: 25px;">
                Membresia vence en: {{date("d-m-Y",strtotime(($cliente->Fecha_Pago_Cliente)."+ 6 month"))}}
            </p>
            @elseif($cliente->Suscripcion_Cliente === 'anual')
            <p class="" style="font-size: 25px;">
                Membresia vence en: {{date("d-m-Y",strtotime(($cliente->Fecha_Pago_Cliente)."+ 12 month"))}}
            </p>
            @endif

        </div>
    </div>
    <hr style="width: 90%; margin:10px auto 20px auto; ">
    <div class="row justify-content-center mx-5">
        <div class="col-12 mb-2">
            <h1 class="text-left">Tus indicadores</h1>
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

    <hr style="width: 90%; margin:10px auto 20px auto; ">
    <div class="row justify-content-center mx-5">
        <div class="col-12 mb-2">
            <h1 class="text-left">Tus Rutinas</h1>
        </div>
    </div>
    <div class="row px-5">
        @foreach ($entrenamientos as $entrenamiento)
        @foreach($rutinas as $rutina)
            @if($rutina->Clave_Rutina === $entrenamiento->Clave_RutinaFK2)
                @break
            @endif
        @endforeach
        @if($rutina->nivel === 'basico')
            <div class="col-6">
        @elseif($rutina->nivel === 'medio')
            <div class="col-4">
        @else
            <div class="col-2">
        @endif
            <a class="btn btn-outline-success btn-lg"  style="width: 100%" href="/rutinas/{{$rutina->Clave_Rutina}}" role="button">Día {{($loop->index)+1}}</a>
        </div>
        @endforeach
        <a class="btn btn-primary mx-4 my-4" href="/entrenamiento/{{$cliente->Clave_Cliente}}/asignarFechas">Asignar días entrenamientos</a>
    </div>

    @else

    <div class="row px-5">
        <div class="col">
            <h3 class="">Aún no te han realizado una valoración</h3>
            <button type="button" class="btn btn-primary " style="">Programar valoración</button>
        </div>
    </div>

    
    @endif
</div>
    
    


@endif
@endsection