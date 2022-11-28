<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use App\Models\Entrenamiento;
use App\Models\Asignado;
use App\Models\Ejercicio;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;

class RecursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:recurso.index')->only('index');
        $this->middleware('can:recurso.create')->only('create');
        $this->middleware('can:recurso.create')->only('store');
        $this->middleware('can:recurso.edit')->only('edit');
        $this->middleware('can:recurso.edit')->only('update');
        $this->middleware('can:recurso.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recurso.index',[
            'recursos' => Recurso::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'tipo' => 'required', 
            'descripcion' => 'required', 
            'qr' => 'required', 
            'nombre' => 'required',
            'cantidad' => 'required'
        ]);

        $recurso = new Recurso();
        $recurso->Clave_Recurso=$request->get('clave');
        $recurso->Tipo_Recurso=$request->get('tipo');
        $recurso->Descripcion_Recurso=$request->get('descripcion');
        $recurso->QR_Recurso=$request->get('qr');
        $recurso->Nombre_Recurso=$request->get('nombre');
        $recurso->Cantidad_Recurso=$request->get('cantidad');
        $recurso->save();

        return redirect('/recursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        
        if($request->get('datetime') === null){
            $date=date("w");
        }else{
            $date=strtotime($request->get('datetime'));
            $date=date("w",$date);
        }
        Log::info($date);

        $recurso = Recurso::findOrFail($id);
        $entrenamientos = Entrenamiento::all();
        $ejercicios = Ejercicio::all();
        $asignados = Asignado::all();

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

        foreach($asignados as $asignado){
                foreach($ejercicios as $ejercicio){
                    if($ejercicio->Clave_Ejercicio === $asignado->Clave_EjercicioFK2 and $ejercicio->Clave_RecursoFK1 === $recurso->Clave_Recurso){
                        foreach($entrenamientos as $entrenamiento){
                            $hour=strtotime($entrenamiento->hora);
                            $hour=date('H',$hour);
                            if($entrenamiento->Clave_RutinaFK2 === $asignado->Clave_RutinaFK1 and $date === $entrenamiento->dia){
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
        
        return view('recurso.show', [
            'recurso' => $recurso,
            'arrChartData' => $arrChartData,
            'fecha' => $date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso = Recurso::findOrFail($id);
        return view('recurso.edit', [
            'recurso' => $recurso
        ]);
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
        $recurso = Recurso::findOrFail($id);
        $recurso->Tipo_Recurso=$request->get('tipo');
        $recurso->Descripcion_Recurso=$request->get('descripcion');
        $recurso->QR_Recurso=$request->get('qr');
        $recurso->Nombre_Recurso=$request->get('nombre');
        $recurso->Cantidad_Recurso=$request->get('cantidad');
        $recurso->save();

        return redirect('/recursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $recurso = Recurso::findOrFail($id);
        $recurso->delete();

        return redirect('/recursos');
    }

}
