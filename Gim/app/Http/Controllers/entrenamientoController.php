<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrenamiento;
use App\Models\Cliente;
use App\Models\Rutina;
use Illuminate\Support\Facades\DB;


class entrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entrenamiento.index',[
            'entrenamientos' => Entrenamiento::all(),
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $objetivo = strval($request->get('objetivo'));
        $nivel = $request->get('nivel');
        $rutinas = Rutina::all();

        if($request->get('objetivo') || $request->get('nivel')){
            if($request->get('ambos')){
                $sql = "SELECT * FROM `rutinas` WHERE `Objetivo` LIKE ?  AND `nivel` LIKE ?";
                $rutinas = DB::select($sql,array($objetivo, $nivel));
            }else{
                $sql = "SELECT * FROM `rutinas` WHERE `Objetivo` LIKE ?  OR `nivel` LIKE ?";
                $rutinas = DB::select($sql,array($objetivo, $nivel));
            }

        }
        return view('entrenamiento.create',[
            'clientes' => Cliente::all(),
            'rutinas' => $rutinas,
            'objetivo' => $objetivo
        ]);
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
            'cliente' => 'required',
            'seleccionado' => 'required'
        ]);

        $rutinas = $request->input("seleccionado");
        foreach ($rutinas as $rutina){
            $rutinaa = DB::table('rutinas')->where('Clave_Rutina',$rutina)->first();
            if($rutinaa->nivel=='basico'){
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
            }elseif($rutinaa->nivel=='medio'){
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
            }else{
                $entrenamiento = new Entrenamiento();
                $entrenamiento->Clave_ClienteFK2 =$request->get('cliente');;
                $entrenamiento->Clave_RutinaFK2 =$rutina;
                $entrenamiento->save();
            }
        }

        return redirect('/cliente');
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
    public function asignarFechas($id)
    {
        $entrenamientos = DB::table('entrenamientos')->where('Clave_ClienteFK2',$id)->get();
        return view('entrenamiento.edit',[
            'entrenamientos' => $entrenamientos
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
        $entrenamiento = Entrenamiento::findOrFail($id);
        $entrenamiento->hora =$request->get('hora');
        $entrenamiento->dia =$request->get('dia');
        $entrenamiento->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrenamiento = Entrenamiento::findOrFail($id);
        $entrenamiento->delete();

        return redirect('/entrenamiento');  
    }
}
