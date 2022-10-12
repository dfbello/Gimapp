<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\Clase;
use Illuminate\Http\Request;

class groupClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('GroupClass.ClassIndex', [
            'clases' => Clase::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('GroupClass.ClassRegister', [
            'Entrenadores' => Entrenador::all()
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
        
        $validaData = $request->validate([
            'nombre' => 'required|min:2|string',
            'descripcion' => 'required|min:5|string',
            'cupos' => 'required|between:5,60|integer',
            'datetime' => 'required',
            'duracion' => 'required|between:5,180|integer'
        ]);

        $clase = new Clase();
        $clase -> Nombre_Clase = $request -> get('nombre');
        $clase -> Descripcion_Clase = $request -> get('descripcion');
        $clase -> Cupos_Clase = $request -> get('cupos');
        $clase -> Horario_Clase = $request -> get('datetime');
        $clase -> Duracion = $request -> get('duracion');
        $clase -> Clave_EntrenadorFK1 = $request -> get('coach');

        $clase -> save();
        return redirect('group_class');
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
