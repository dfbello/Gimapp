@extends('layouts.app')
@section('title', 'Progresos')

@section('content')
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>

<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>


<?php
include(app_path().'/includes/fusioncharts.php');

// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Progreso de {$cliente->Nombre_Cliente} Peso",
            "xAxisName" => "Mes",
            "yAxisName" => "Peso",
            "theme" => "candy"
        )
    );
    // An array of hash objects which stores data


$arrLabelValueDataPeso = array();

    // Pushing labels and values
    for($i = 0; $i < count($arrChartDataPeso); $i++) {
        array_push($arrLabelValueDataPeso, array(
            "label" => $arrChartDataPeso[$i][0], "value" => $arrChartDataPeso[$i][1]
        ));
    }
    $arrChartConfig["data"] = $arrLabelValueDataPeso;

    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData = json_encode($arrChartConfig);

    // chart object
    $Chart1 = new FusionCharts("line", "MyFirstChart" , "95%", "700", "chart-container1", "json", $jsonEncodedData);

    // Render the chart
    $Chart1->render();
    ?>
    <center class="mt-3">
        <div id="chart-container1">Chart will render here!</div>
    </center>


<?php
// Chart Configuration stored in Associative Array
$arrChartConfigIMC = array(
        "chart" => array(
            "caption" => "Progreso de {$cliente->Nombre_Cliente} IMC",
            "xAxisName" => "Mes",
            "yAxisName" => "IMC",
            "theme" => "candy"
        )
    );
    // An array of hash objects which stores data


$arrLabelValueDataIMC = array();

    // Pushing labels and values
    for($i = 0; $i < count($arrChartDataIMC); $i++) {
        array_push($arrLabelValueDataIMC, array(
            "label" => $arrChartDataIMC[$i][0], "value" => $arrChartDataIMC[$i][1]
        ));
    }
    $arrChartConfigIMC["data"] = $arrLabelValueDataIMC;

    // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    $jsonEncodedData2 = json_encode($arrChartConfigIMC);

    // chart object
    $Chart2 = new FusionCharts("line", "MyFirstChart2" , "95%", "700", "chart-container2", "json", $jsonEncodedData2);

    // Render the chart
    $Chart2->render();
    ?>


    <center class="mt-3">
        <div id="chart-container2">Chart will render here!</div>
    </center>
@endsection