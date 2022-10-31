<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\Asignado;
use Illuminate\Support\Facades\DB;

class rutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rutina.index',[
            'rutinas' => Rutina::all()
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
        return view('rutina.create',[
            'ejercicios' => Ejercicio::all()
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
        //
        $validData = $request->validate([
            'Objetivo' => 'required',
            'nivel' => 'required'
        ]);

        $rutina = new Rutina();
        $rutina->Objetivo=$request->get('Objetivo');
        $rutina->nivel=$request->get('nivel');
        $rutina->save();

        $ejercicios = $request->input("seleccionado");
        $rutinaid = DB::table('rutinas')->latest('created_at')->first();
        foreach ($ejercicios as $ejercicio){
            $asignado = new Asignado();
            $asignado->Clave_RutinaFK1=$rutinaid->Clave_Rutina;
            $asignado->Clave_EjercicioFK2=$ejercicio;
            $asignado->save();
        }

        return redirect('/rutinas');
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
        $rutina = Rutina::findOrFail($id);
        return view('rutina.edit', [
            'rutina' => $rutina,
            'ejercicios' => Ejercicio::all()
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
        //
        $rutina = Rutina::findOrFail($id);
        $rutina->Objetivo=$request->get('Objetivo');
        $rutina->nivel=$request->get('nivel');
        $rutina->save();

        $asignado = Asignado::where('Clave_RutinaFK1',$id);
        $asignado->delete();

        $ejercicios = $request->input("seleccionado");
        $rutinaid = DB::table('rutinas')->latest('created_at')->first();
        foreach ($ejercicios as $ejercicio){
            $asignado = new Asignado();
            $asignado->Clave_RutinaFK1=$rutinaid->Clave_Rutina;
            $asignado->Clave_EjercicioFK2=$ejercicio;
            $asignado->save();
        }

        return redirect('/rutinas');
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
        $asignado = Asignado::where('Clave_RutinaFK1',$id);
        $asignado->delete();

        $rutina = Rutina::findOrFail($id);
        $rutina->delete();

        return redirect('/rutinas');
    }
}
