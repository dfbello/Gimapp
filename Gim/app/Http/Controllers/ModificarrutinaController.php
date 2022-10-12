<?php

namespace App\Http\Controllers;

use App\Models\Modificarrutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificarrutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes'] = DB::select('select * from cliente');
        $datos['ejercicios'] = DB::select('select * from ejercicio');
        //return response()->json($clientes);
        return view('asignarrutina', $datos);
    }

    public function editarRutina($id){
        
        $rutina = DB::select('SELECT * FROM rutina WHERE Clave_Rutina = ?',[$id]);
        $ejercicios = DB::select('SELECT * FROM ejercicio,asignados WHERE Clave_EjercicioFK2 = Clave_Ejercicio AND Clave_RutinaFK1 = ?',[$id]);
        
        return view('modificarrutina', compact("rutina","ejercicios","id"));
        //return response()->json($rutina);
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
     * @param  \App\Models\Modificarrutina  $modificarrutina
     * @return \Illuminate\Http\Response
     */
    public function show(Modificarrutina $modificarrutina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modificarrutina  $modificarrutina
     * @return \Illuminate\Http\Response
     */
    public function edit(Modificarrutina $modificarrutina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modificarrutina  $modificarrutina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modificarrutina $modificarrutina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modificarrutina  $modificarrutina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modificarrutina $modificarrutina)
    {
        //
    }
}
