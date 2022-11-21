<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Rutina;
use App\Models\Progreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index',[
            'clientes' => Cliente::all()
        ]);
    }

    public function asignarEntrenamiento(Request $request, $id)
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
            'cliente' => Cliente::findOrFail($id),
            'rutinas' => $rutinas,
            'objetivo' => $objetivo
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        
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
        return view('cliente.edit',
        ['cliente' => Cliente::findOrFail($id)]);
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
        $validaData = $request->validate([
            'Peso_Cliente' => 'required',
            'Estatura_Cliente' => 'required',
            'Objetivos_Cliente' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente-> Peso_Cliente = $request->get('Peso_Cliente');
        $cliente-> Estatura_Cliente = $request->get('Estatura_Cliente');
        $cliente-> IMC_Cliente = intval(($request->get('Peso_Cliente'))/($request->get('Estatura_Cliente')*$request->get('Estatura_Cliente')));
        $cliente-> Objetivos_Cliente = $request->get('Objetivos_Cliente');

        $cliente->save();

        $progreso = new Progreso();
        $progreso->Clave_ClienteFK4 = $cliente->Clave_Cliente;
        $progreso->Peso_Cliente2 = $request->get('Peso_Cliente');
        $progreso->Estatura_Cliente2 = $request->get('Estatura_Cliente');
        $progreso->IMC_Cliente2 = intval(($request->get('Peso_Cliente'))/($request->get('Estatura_Cliente')*$request->get('Estatura_Cliente')));
        $progreso->Objetivos_Cliente2 = $request->get('Objetivos_Cliente');

        $progreso->save();

        return redirect('/cliente');
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
