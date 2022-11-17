<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Rutina;
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
