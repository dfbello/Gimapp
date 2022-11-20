@extends('layouts.app')

@section('title', 'Home')

@section('content')
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>

<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>


<?php
include(app_path().'/includes/fusioncharts.php');

// Chart Configuration stored in Associative Array
$arrChartConfig = array(
        "chart" => array(
            "caption" => "Promedio de usuarios por hora",
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
    $Chart = new FusionCharts("column2d", "MyFirstChart" , "95%", "700", "chart-container", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
    ?>
    <center>
        <div id="chart-container">Chart will render here!</div>
    </center>
@endsection