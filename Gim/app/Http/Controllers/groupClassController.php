<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\GroupClass;
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
        $timestamp = time();
        $curr_date = date("d/m/Y", $timestamp);
        return "hola" . $curr_date;
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
        #$timestamp = time();
        #date_default_timezone_set('America/Bogota');
        #$curr_date = date("d/m/Y h:i a", $timestamp);
        $validaData = $request->validate([
            'nombre' => 'required|min:2|string',
            'descripcion' => 'required|min:5|string',
            'cupos' => 'required|between:5,60|integer',
            'datetime' => 'required|after:now',
            'duracion' => 'required|between:5,180|integer'
        ]);

        $clase = new GroupClass();
        $clase -> clave = $request -> get('clave');
        $clase -> descripcion_clase = $request -> get('nombre');

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
