<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Rutina;
use App\Models\Progreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cliente.index')->only('index');
        $this->middleware('can:cliente.index')->only('asignarEntrenamiento');
        $this->middleware('can:cliente.index')->only('edit');
        $this->middleware('can:cliente.index')->only('update');
        $this->middleware('can:cliente.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = strval($request->get('name'));
        $cedula = $request->get('cedula');
        $clientes = Cliente::all();

        if($request->get('name') || $request->get('cedula')){
            $sql = "SELECT * FROM `clientes` WHERE `Nombre_Cliente` LIKE ?  OR `Clave_Cliente` LIKE ?";
            $clientes = DB::select($sql,array($nombre, $cedula));
        }
        return view('cliente.index',[
            'clientes' => $clientes
        ]);
    }

    public function verificar(){
        $clientes = Cliente::all();
        foreach($clientes as $cliente){
            $fecha_membresia = strtotime($cliente->Fecha_Vence_Pago_Cliente);
            $fecha_actual = strtotime(date('Y-m-d'));
            if($fecha_membresia < $fecha_actual){
                $cliente->Estado = 0;
                $cliente->save();
            }
        }

        return redirect('/cliente');
    }

    public function renovarMembresia($id, Request $r){
        $cliente = Cliente::findOrFail($id);
        $cliente->Suscripcion_Cliente = $r->get('plan');
        $cliente->Fecha_Pago_Cliente = date('Y-m-d');
        $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 1 month")); 
        if($r->get('plan') == 'mensual'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 1 month")); 
        }elseif($r->get('plan') == 'trimestral'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 3 month")); 
        }elseif($r->get('plan') == 'semestral'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 6 month"));  
        }elseif($r->get('plan') == 'anual'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 12 month"));  
        }

        $cliente->Fecha_Vence_Pago_Cliente =$fvp;

        $cliente -> Estado = true; 
        
        $cliente->save();
        return redirect('/cliente');
    }

    

    public function asignarEntrenamiento(Request $request, $id)
    {
        $objetivo = strval($request->get('objetivo'));
        $nivel = $request->get('nivel');
        $rutinas = Rutina::all();

        if($request->get('objetivo') || $request->get('nivel')){
            if($request->get('ambos')){
                $sql = "SELECT * FROM `rutinas` WHERE `Objetivo` LIKE ?  AND `nivel` LIKE ?";
                $rutinas = DB::select($sql,array($objetivo, $nivel));
            }else{
                $sql = "SELECT * FROM `rutinas` WHERE `Objetivo` LIKE ?  OR `nivel` LIKE ?";
                $rutinas = DB::select($sql,array($objetivo, $nivel));
            }
        }

        return view('entrenamiento.create',[
            'cliente' => Cliente::findOrFail($id),
            'rutinas' => $rutinas,
            'objetivo' => $objetivo
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        
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
        return view('cliente.edit',
        ['cliente' => Cliente::findOrFail($id)]);
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
            'Peso_Cliente' => 'required',
            'Estatura_Cliente' => 'required',
            'Objetivos_Cliente' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente-> Peso_Cliente = $request->get('Peso_Cliente');
        $cliente-> Estatura_Cliente = $request->get('Estatura_Cliente');
        $cliente-> IMC_Cliente = intval(($request->get('Peso_Cliente'))/($request->get('Estatura_Cliente')*$request->get('Estatura_Cliente')));
        $cliente-> Objetivos_Cliente = $request->get('Objetivos_Cliente');

        $cliente->save();

        $progreso = new Progreso();
        $progreso->Clave_ClienteFK4 = $cliente->Clave_Cliente;
        $progreso->Peso_Cliente2 = $request->get('Peso_Cliente');
        $progreso->Estatura_Cliente2 = $request->get('Estatura_Cliente');
        $progreso->IMC_Cliente2 = intval(($request->get('Peso_Cliente'))/($request->get('Estatura_Cliente')*$request->get('Estatura_Cliente')));
        $progreso->Objetivos_Cliente2 = $request->get('Objetivos_Cliente');

        $progreso->save();

        return redirect('/cliente');
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
