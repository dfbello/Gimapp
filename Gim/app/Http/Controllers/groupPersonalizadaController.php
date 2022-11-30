<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Entrenador;
use App\Models\Personalizada;
use Illuminate\Http\Request;

class groupPersonalizadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:personalizada.index')->only('index');
        $this->middleware('can:personalizada.create')->only('create');
        $this->middleware('can:personalizada.create')->only('store');
        $this->middleware('can:personalizada.edit')->only('edit');
        $this->middleware('can:personalizada.edit')->only('update');
        $this->middleware('can:personalizada.inscribirCliente')->only('inscribirCliente');
        $this->middleware('can:personalizada.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();
        return view('GroupPersonalizada.PersonalizadaIndex', [
            'cliente' => $cliente ,
            'personalizadas' => Personalizada::all(),
            'entrenador' => Entrenador::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('GroupPersonalizada.PersonalizadaRegister', [
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
            'descripcion' => 'required|min:1|string',
            'cupos' => 'required|between:1,1|integer',
            'datetime' => 'required',
            'duracion' => 'required|between:5,180|integer'
        ]);

        $personalizada = new Personalizada();
        $personalizada -> Nombre_Personalizada = $request -> get('nombre');
        $personalizada -> Descripcion_Personalizada = $request -> get('descripcion');
        $personalizada -> Cupos_Personalizada = $request -> get('cupos');
        $personalizada -> Horario_Personalizada = $request -> get('datetime');
        $personalizada -> Duracion = $request -> get('duracion');
        $personalizada -> Clave_EntrenadorFK1 = $request -> get('coach');

        $Personalizada -> save();
        return redirect('group_personalizada');
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
        $Personalizada = Personalizada::findOrFail($id);
        return view('GroupPersonalizada.PersonalizadaEdit', [
            'personalizada' => $personalizada,
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
            'cupos' => 'required|between:0,60|integer',
            'datetime' => 'required',
            'duracion' => 'required|between:5,180|integer'
        ]);

        $personalizada = Personalizada::FindOrFail($id);
        $personalizada -> Nombre_Personalizada = $request -> get('nombre');
        $personalizada -> Descripcion_Personalizada = $request -> get('descripcion');
        $personalizada -> Cupos_Personalizada = $request -> get('cupos');
        $personalizada -> Horario_Personalizada = $request -> get('datetime');
        $personalizada -> Duracion = $request -> get('duracion');
        $personalizada -> Clave_EntrenadorFK1 = $request -> get('coach');
        
        $personalizada -> save();
        return redirect('group_personalizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personalizada = Personalizada::findOrFail($id);
        $personalizadasAsig = DB::table('asignarpersonalizadas')->where('Clave_PersonalizadaFK1',$personalizada->Clave_Personalizada);
        $personalizadasAsig->delete();
        $personalizada->delete();

        return redirect('/group_personalizada'); 
    }

    public function inscribirCliente($id)
    {
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();
        $personalizada = Personalizada::findOrFail($id);
        //inserta id de personalizada y cliente en la tabla de asignacion
        DB::table('asignarpersonalizadas')->insert([
            'Clave_PersonalizadaFK1' => $personalizada->Clave_Personalizada,
            'Clave_ClienteFK3' => $cliente->Clave_Cliente
        ]);
        //actualiza el numero de cupos
        DB::table('personalizadas')->where('Clave_Personalizada',$personalizada ->Clave_Personalizada)->update([
            'Cupos_Personalizada' => $personalizada -> Cupos_Personalizada - 1
        ]);
        
        return redirect('/group_personalizada');
    }
}
