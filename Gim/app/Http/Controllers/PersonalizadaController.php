<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personalizada;
use App\Models\AsignarPersonalizada;
use App\Models\Cliente;


class PersonalizadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('personalizada.index',[
            'personalizadas' => personalizada::all()
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
     * @param  \App\Models\Personalizada  $personalizada
     * @return \Illuminate\Http\Response
     */
    public function show(Personalizada $personalizada)
    {
        //
        $personalizada = Personalizada::findOrFail($id);
        $asistentes = AsignarPersonalizada::where('Clave_PersonalizadaFK1', $id)->pluck('Clave_ClienteFK4')->toArray();
        $clientes = Cliente::whereIn('Clave_Cliente',$asistentes)->get();
        //return response()->json($clientes);
        return view('clase.asistentes', [
            'personalizada' => $personalizada,
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personalizada  $personalizada
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalizada $personalizada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personalizada  $personalizada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalizada $personalizada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personalizada  $personalizada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalizada $personalizada)
    {
        //
    }
}
