<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();

        $a1p=0;
        $a2p=0;
        $a3p=0;
        $a4p=0;
        $a5p=0;
        $a6p=0;
        $a7p=0;
        $a8p=0;
        $a9p=0;
        $a10p=0;
        $a11p=0;
        $a12p=0;

        $a1i=0;
        $a2i=0;
        $a3i=0;
        $a4i=0;
        $a5i=0;
        $a6i=0;
        $a7i=0;
        $a8i=0;
        $a9i=0;
        $a10i=0;
        $a11i=0;
        $a12i=0;

        $progresos = Progreso::all();

        foreach($progresos as $progreso){
            if($progreso->Clave_ClienteFK4 === $cliente->Clave_Cliente){
                $date=strtotime($progreso->created_at);
                $date=date('M',$date);
                if($date==='Jan'){
                    $a1p=$progreso->Peso_Cliente2;
                    $a1i=$progreso->IMC_Cliente2;
                }elseif($date==='Feb'){
                    $a2p=$progreso->Peso_Cliente2;
                    $a2i=$progreso->IMC_Cliente2;
                }elseif($date==='Mar'){
                    $a3p=$progreso->Peso_Cliente2;
                    $a3i=$progreso->IMC_Cliente2;
                }elseif($date==='Apr'){
                    $a4p=$progreso->Peso_Cliente2;
                    $a4i=$progreso->IMC_Cliente2;
                }elseif($date==='May'){
                    $a5p=$progreso->Peso_Cliente2;
                    $a5i=$progreso->IMC_Cliente2;
                }elseif($date==='Jun'){
                    $a6p=$progreso->Peso_Cliente2;
                    $a6i=$progreso->IMC_Cliente2;
                }elseif($date==='Jul'){
                    $a7p=$progreso->Peso_Cliente2;
                    $a7i=$progreso->IMC_Cliente2;
                }elseif($date==='Aug'){
                    $a8p=$progreso->Peso_Cliente2;
                    $a8i=$progreso->IMC_Cliente2;
                }elseif($date==='Sep'){
                    $a9p=$progreso->Peso_Cliente2;
                    $a9i=$progreso->IMC_Cliente2;
                }elseif($date==='Oct'){
                    $a10p=$progreso->Peso_Cliente2;
                    $a10i=$progreso->IMC_Cliente2;
                }elseif($date==='Nov'){
                    $a11p=$progreso->Peso_Cliente2;
                    $a11i=$progreso->IMC_Cliente2;
                }elseif($date==='Dec'){
                    $a12p=$progreso->Peso_Cliente2;
                    $a12i=$progreso->IMC_Cliente2;
                }
            }
        }



        $arrChartDataPeso = array(
        ["Ene", $a1p],
        ["Feb", $a2p],
        ["Mar", $a3p],
        ["Abr",$a4p],
        ["May",$a5p],
        ["Jun",$a6p],
        ["Jul",$a7p],
        ["Ago",$a8p],
        ["Sep",$a9p],
        ["Oct",$a10p],
        ["Nov",$a11p],
        ["Dic",$a12p]
        );
        $arrChartDataIMC = array(
            ["Ene", $a1i],
            ["Feb", $a2i],
            ["Mar", $a3i],
            ["Abr",$a4i],
            ["May",$a5i],
            ["Jun",$a6i],
            ["Jul",$a7i],
            ["Ago",$a8i],
            ["Sep",$a9i],
            ["Oct",$a10i],
            ["Nov",$a11i],
            ["Dic",$a12i]
            );
        return view('progreso.index',[
            'arrChartDataPeso' => $arrChartDataPeso,
            'arrChartDataIMC' => $arrChartDataIMC,
            'cliente' => $cliente,
            'progreso' => $progresos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
