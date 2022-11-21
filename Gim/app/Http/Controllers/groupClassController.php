<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();
        return view('GroupClass.ClassIndex', [
            'cliente' => $cliente ,
            'clases' => Clase::all(),
            'entrenador' => Entrenador::all()
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
        $clase = Clase::findOrFail($id);
        return view('GroupClass.ClassEdit', [
            'clase' => $clase,
            'Entrenadores' => Entrenador::all()
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
        $validaData = $request->validate([
            'nombre' => 'required|min:2|string',
            'descripcion' => 'required|min:5|string',
            'cupos' => 'required|between:5,60|integer',
            'datetime' => 'required',
            'duracion' => 'required|between:5,180|integer'
        ]);

        $clase = Clase::FindOrFail($id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->delete();

        return redirect('/group_class'); 
    }

    public function inscribirCliente($id)
    {
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();
        $clase = Clase::findOrFail($id);
        //inserta id de clase y cliente en la tabla de asignacion
        DB::table('asignarclases')->insert([
            'Clave_ClaseFK1' => $clase->Clave_Clase,
            'Clave_ClienteFK3' => $cliente->Clave_Cliente
        ]);
        //actualiza el numero de cupos
        DB::table('clases')->where('Clave_Clase',$clase ->Clave_Clase)->update([
            'Cupos_Clase' => $clase -> Cupos_Clase - 1
        ]);
        
        return redirect('/group_class');
    }
}
