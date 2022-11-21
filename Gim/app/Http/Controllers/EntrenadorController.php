<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Entrenador;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entrenador.index', [
            'entrenadores' => Entrenador::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenador.register');
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
            'cedula' => 'required|integer|digits_between:6,10',
            'name' => 'required|min:2|string',
            'celular' => 'required|digits:10|integer',
            'direccion' => 'required|string',
            'email' => 'required|email|unique:users',
            'edad' => 'required|min:14|max:99|integer',
            'descripcion' => 'required|min:10|max:200|string',
            'horario' => 'required|min:5|max:70|string',
            'password' => 'min:3|required|confirmed'

            
        ]);

        $entrenador = new Entrenador();
        $entrenador->Clave_Entrenador = $request->get('cedula');
        $entrenador->Nombre_Entrenador = $request->get('name');
        $entrenador->Telefono_Entrenador = $request->get('celular');
        $entrenador->Direccion_Entrenador = $request->get('direccion');
        $entrenador->Correo_Entrenador = $request->get('email');
        $entrenador->Edad_Entrenador = $request->get('edad');
        $entrenador->Descripcion_Entrenador = $request->get('descripcion');
        $entrenador->Horario_Entrenador = $request->get('horario');
    
        $entrenador->save();
        
        $user = User::create(request(['name', 'email', 'password']));

        return redirect('/entrenador');
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
        $entrenador = Entrenador::findOrFail($id);
        return view('entrenador.edit', [
            'entrenador' => $entrenador
           
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
            'cedula' => 'required|integer|digits_between:6,10',
            'celular' => 'required|digits:10|integer',
            'direccion' => 'required|string',
            'edad' => 'required|min:14|max:99|integer',
            'descripcion' => 'required|min:10|max:200|string',
            'horario' => 'required|min:5|max:70|string',

            
        ]);

        $entrenador = Entrenador::findOrFail($id);
        $entrenador->Clave_Entrenador = $request->get('cedula');
        $entrenador->Telefono_Entrenador = $request->get('celular');
        $entrenador->Direccion_Entrenador = $request->get('direccion');
        $entrenador->Edad_Entrenador = $request->get('edad');
        $entrenador->Descripcion_Entrenador = $request->get('descripcion');
        $entrenador->Horario_Entrenador = $request->get('horario');
    
        $entrenador->save();

        return redirect('/entrenador');
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
