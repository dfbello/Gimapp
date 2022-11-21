@extends('layouts.app')
@section('title', 'Estadisticas')

@section('content')

<div class="row justify-content-center mx-5">
        <div class="col-8 my-3">
            <h1 class="text-center">{{$recurso->Nombre_Recurso}}</h1>
        </div>
</div>

<div class="form-group-class w-100 m-auto mt-3">
    <form action="/recursos/{{$recurso->Clave_Recurso}}" method = "SHOW">
    @csrf
        
        <div class="form-floating w-50 m-auto">
            <input type="datetime-local" class="form-control w-" id="datetime" name = "datetime" value = "{{old('datetime')}}" >
            <label for="datetime">Seleccione una Fecha</label>
        </div>


        <div class= "row justify-content-center w-50 m-auto mt-3">
            <button type= "submit" class="w-50 btn btn-lg btn-primary m-auto" >Mostrar</button>
            <a href="/recursos" class="w-50 btn btn-lg btn-outline-danger m-auto mt-3" role="button">Regresar</a>
        </div>
    </form>
    
</div>

<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>

<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>


<?php
include(app_path().'/includes/fusioncharts.php');

// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Uso de {$recurso->Nombre_Recurso} el {$fecha}",
            "xAxisName" => "Hora",
            "yAxisName" => "Usuarios",
            "theme" => "candy"
        )
    );
    // An array of hash objects which stores data


$arrLabelValueData = array();

    // Pushing labels and values
    for($i = 0; $i < count($arrChartData); $i++) {
        array_push($arrLabelValueData, array(
            "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
        ));
    }
    $arrChartConfig["data"] = $arrLabelValueData;

    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData = json_encode($arrChartConfig);

    // chart object
    $Chart = new FusionCharts("line", "MyFirstChart" , "95%", "700", "chart-container", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
    ?>
    <center>
        <div id="chart-container">Chart will render here!</div>
    </center>

@endsection