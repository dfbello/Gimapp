<?php

namespace App\Http\Controllers;

use App\Models\asignarrutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarrutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes'] = DB::select('select * from clientes');
        $datos['ejercicios'] = DB::select('select * from ejercicio');
        //return response()->json($clientes);
        return view('asignarrutina', $datos);
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
        try{
            $datosRutina['rutina'] = request()->except('_token','seleccionado');
            $ejercicios = $request->input("seleccionado");

            //config(['database.connections.mysql.username' => session("nombre")]);
            //config(['database.connections.mysql.password' => session("contrasena")]);
            //DB::connection('mysql')->getpdo()->exec('insert into rutina values ("'
            //                                        .$request->input("Clave_Rutina")
            //                                        .'","'.$request->input("Fecha_Rutina")
            //                                        .'",'.$request->input("Hora_Rutina")
            //                                        .','.$request->input("Clave_ClienteFK1")
            //                                        .'")');

            //DB::insert('insert into rutina (Clave_Rutina, Fecha_Rutina, Hora_Rutina, Clave_ClienteFK1) values ('.$request->input("Clave_Rutina").','.$request->input("Fecha_Rutina").','.$request->input("Hora_Rutina").','.$request->input("Clave_ClienteFK1").')');
            DB::table('rutina')->insert($datosRutina);
            foreach ($ejercicios as $ejercicio){
                //$ejercicioInsert=array($request->input("Clave_Rutina"),$ejercicio);
                //DB::table('asignados')->insert($ejercicioInsert);
                DB::insert('insert into asignados (Clave_RutinaFK1, Clave_EjercicioFK2) values (?, ?)', [$request->get('Clave_Rutina'), $ejercicio]);
                //return response()->json($ejercicio);
            }
            //return response()->json($request->get('Clave_Rutina'));
            //return view('asignarejercicio', $datosRutina);
            return redirect()->route("asignarRutina")->with(['error'=>'Rutina asignada correctamente',"tipo"=>"success"]);
        }catch(\Exception $th){
            return redirect()->route("asignarRutina")->with(['error'=>$th->getMessage(),"tipo"=>"danger"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignarrutina  $asignarrutina
     * @return \Illuminate\Http\Response
     */
    public function show(asignarrutina $asignarrutina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignarrutina  $asignarrutina
     * @return \Illuminate\Http\Response
     */
    public function edit(asignarrutina $asignarrutina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignarrutina  $asignarrutina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignarrutina $asignarrutina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignarrutina  $asignarrutina
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignarrutina $asignarrutina)
    {
        //
    }
}
