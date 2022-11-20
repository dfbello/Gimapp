<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrenamiento;

class CantUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a7=0;
        $a8=0;
        $a9=0;
        $a10=0;
        $a11=0;
        $a12=0;
        $a13=0;
        $a14=0;
        $a15=0;
        $a16=0;
        $a17=0;
        $a18=0;
        $a19=0;
        $a20=0;
        $a21=0;

        $entrenamientos = Entrenamiento::all();

        foreach($entrenamientos as $entrenamiento){
            $hour=strtotime($entrenamiento->hora);
            $hour=date('H',$hour);
            $date=$entrenamiento->fecha;
            $todayDate = date('Y-m-d');
            if($date==$todayDate){
                if($hour>=21){
                    $a21=$a21+1;
                }elseif($hour>=20){
                    $a20=$a20+1;
                }elseif($hour>=19){
                    $a19=$a19+1;
                }elseif($hour>=18){
                    $a18=$a18+1;
                }elseif($hour>=17){
                    $a17=$a17+1;
                }elseif($hour>=16){
                    $a16=$a16+1;
                }elseif($hour>=15){
                    $a15=$a15+1;
                }elseif($hour>=14){
                    $a14=$a14+1;
                }elseif($hour>=13){
                    $a13=$a13+1;
                }elseif($hour>=12){
                    $a12=$a12+1;
                }elseif($hour>=11){
                    $a11=$a11+1;
                }elseif($hour>=10){
                    $a10=$a10+1;
                }elseif($hour>=9){
                    $a9=$a9+1;
                }elseif($hour>=8){
                    $a8=$a8+1;
                }elseif($hour>=7){
                    $a7=$a7+1;
                }
            }
        }


        $arrChartData = array(
        ["7:00", $a7],
        ["8:00", $a8],
        ["9:00", $a9],
        ["10:00",$a10],
        ["11:00",$a11],
        ["12:00",$a12],
        ["13:00",$a13],
        ["14:00",$a14],
        ["15:00",$a15],
        ["16:00",$a16],
        ["17:00",$a17],
        ["18:00",$a18],
        ["19:00",$a19],
        ["20:00",$a20],
        ["21:00",$a21]
        );
        return view('cantusuario.index',[
            'arrChartData' => $arrChartData
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
