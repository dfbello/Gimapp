<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;
use App\Models\Recurso;
use App\Models\Asignado;

class ejercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ejercicio.index',[
            'ejercicios' => Ejercicio::all(),
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
        return view('ejercicio.create',[
            'recursos' => Recurso::all()
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
            'Descripcion_Ejercicio' => 'required',
            'Series_Ejercicio' => 'required',
            'Repeticiones_Ejercicio' => 'required',
        ]);

        $ejercicio = new Ejercicio();

        $ejercicio-> Descripcion_Ejercicio = $request->get('Descripcion_Ejercicio');
        $ejercicio-> Series_Ejercicio = $request->get('Series_Ejercicio');
        $ejercicio-> Repeticiones_Ejercicio = $request->get('Repeticiones_Ejercicio');
        $ejercicio-> Clave_RecursoFK1 = $request->get('recurso');

        $ejercicio->save();

        return redirect('/ejercicio');
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
        $ejercicio = Ejercicio::findOrFail($id);
        return view('ejercicio.edit', [
            'ejercicio' => $ejercicio,
            'recursos' => Recurso::all()
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
            'Descripcion_Ejercicio' => 'required',
            'Series_Ejercicio' => 'required',
            'Repeticiones_Ejercicio' => 'required',
        ]);

        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio-> Descripcion_Ejercicio = $request->get('Descripcion_Ejercicio');
        $ejercicio-> Series_Ejercicio = $request->get('Series_Ejercicio');
        $ejercicio-> Repeticiones_Ejercicio = $request->get('Repeticiones_Ejercicio');
        $ejercicio-> Clave_RecursoFK1 = $request->get('recurso');

        $ejercicio->save();

        return redirect('/ejercicio');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rutinas_con_ejercicio = Asignado::where('Clave_EjercicioFK2',$id);
        $rutinas_con_ejercicio->delete();

        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();

        return redirect('/ejercicio');   
    }
}
