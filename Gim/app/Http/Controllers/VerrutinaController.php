<?php

namespace App\Http\Controllers;

use App\Models\Verrutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerrutinaController extends Controller
{
#    /**
#     * Display a listing of the resource.
#     *
#     * @return \Illuminate\Http\Response
#     */
#    public function viewRutinas()
#    {
#        //
#        $datos['rutinas'] = DB::select('SELECT * FROM rutinas ORDER BY Clave_Rutina DESC');
#        
#
#        return view('verrutinas', $datos);
#    }
#
#    public function eliminarRutina($id){
#        try {
#            
#            //DB::connection('mysql')->getpdo()->exec('CALL cancelarVenta ('.$id.')');
#            
#            DB::delete('DELETE FROM asignados WHERE Clave_RutinaFK1 = ?', [$id]);
#            DB::delete('DELETE FROM rutinas WHERE Clave_Rutina = ?', [$id]);
#            return redirect()->route("verrutinas")->with(['error'=>"Rutina eliminada correctamente","tipo"=>"success"]);
#        } catch (\Exception $th) {
#            return redirect()->route("verrutinas")->with(['error'=>$th->getMessage(),"tipo"=>"danger"]);
#        }
#    }
#
#    /**
#     * Show the form for creating a new resource.
#     *
#     * @return \Illuminate\Http\Response
#     */
#    public function create()
#    {
#        //
#    }
#
#    /**
#     * Store a newly created resource in storage.
#     *
#     * @param  \Illuminate\Http\Request  $request
#     * @return \Illuminate\Http\Response
#     */
#    public function store(Request $request)
#    {
#        //
#    }
#
#    /**
#     * Display the specified resource.
#     *
#     * @param  \App\Models\Verrutina  $verrutina
#     * @return \Illuminate\Http\Response
#     */
#    public function show(Verrutina $verrutina)
#    {
#        //
#    }
#
#    /**
#     * Show the form for editing the specified resource.
#     *
#     * @param  \App\Models\Verrutina  $verrutina
#     * @return \Illuminate\Http\Response
#     */
#    public function edit(Verrutina $verrutina)
#    {
#        //
#    }
#
#    /**
#     * Update the specified resource in storage.
#     *
#     * @param  \Illuminate\Http\Request  $request
#     * @param  \App\Models\Verrutina  $verrutina
#     * @return \Illuminate\Http\Response
#     */
#    public function update(Request $request, Verrutina $verrutina)
#    {
#        //
#    }
#
#    /**
#     * Remove the specified resource from storage.
#     *
#     * @param  \App\Models\Verrutina  $verrutina
#     * @return \Illuminate\Http\Response
#     */
#    public function destroy(Verrutina $verrutina)
#    {
#        //
#    }
}
