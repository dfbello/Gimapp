<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recurso.index',[
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
        return view('recurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'clave' => 'required',
            'tipo' => 'required', 
            'descripcion' => 'required', 
            'qr' => 'required', 
            'nombre' => 'required',
            'cantidad' => 'required'
        ]);

        $recurso = new Recurso();
        $recurso->Clave_Recurso=$request->get('clave');
        $recurso->Tipo_Recurso=$request->get('tipo');
        $recurso->Descripcion_Recurso=$request->get('descripcion');
        $recurso->QR_Recurso=$request->get('qr');
        $recurso->Nombre_Recurso=$request->get('nombre');
        $recurso->Cantidad_Recurso=$request->get('cantidad');
        $recurso->save();

        return redirect('/recursos');
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
        $recurso = Recurso::findOrFail($id);
        return view('recurso.edit', [
            'recurso' => $recurso
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
        $recurso = Recurso::findOrFail($id);
        $recurso->Tipo_Recurso=$request->get('tipo');
        $recurso->Descripcion_Recurso=$request->get('descripcion');
        $recurso->QR_Recurso=$request->get('qr');
        $recurso->Nombre_Recurso=$request->get('nombre');
        $recurso->Cantidad_Recurso=$request->get('cantidad');
        $recurso->save();

        return redirect('/recursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        $recurso->delete();

        return redirect('/recursos');
    }

    public function confirmDelete($id){
        $recurso = Recurso::findOrFail($id);
        return view('recurso.confirmDelete', [
            'recurso' => $recurso
        ]);
    }

}
