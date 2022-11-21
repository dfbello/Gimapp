<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anuncio.index',[
            'anuncios' => Anuncio::all()->sortByDesc('updated_at')
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuncio.create');
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
            'nombre' => 'required', 
            'descripcion' => 'required', 
            'folleto' => 'required', 
        ]);

        $anuncio = new Anuncio();
        $anuncio->Nombre_Anuncio=$request->get('nombre');
        $anuncio->Descripcion_Anuncio=$request->get('descripcion');
        $anuncio->Folleto_Anuncio=$request->get('folleto');
        $anuncio->save();

        return redirect('/anuncios');
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
        $anuncio = Anuncio::findOrFail($id);
        return view('anuncio.edit', [
            'anuncio' => $anuncio
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
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->Nombre_Anuncio=$request->get('nombre');
        $anuncio->Descripcion_Anuncio=$request->get('descripcion');
        $anuncio->Folleto_Anuncio=$request->get('folleto');
        $anuncio->save();

        return redirect('/anuncios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();

        return redirect('/anuncios');
    }
}
