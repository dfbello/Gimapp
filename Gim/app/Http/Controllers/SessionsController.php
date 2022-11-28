<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Progreso;
use App\Models\Entrenamiento;
use App\Models\Rutina;

class SessionsController extends Controller
{

    public function index(){
        $nombre = Auth::user();
        $cliente = DB::table('clientes')->where('Correo_Cliente',$nombre->email)->first();

        if($cliente){
            $sql = "SELECT DISTINCT `Clave_RutinaFK2` FROM `entrenamientos` WHERE `Clave_ClienteFK2` = ?";
            $entrenamientos = DB::select($sql,array($cliente->Clave_Cliente));
            $rutinas = Rutina::all();
            $valoraciones = DB::table('progresos')->where('Clave_ClienteFK4',$cliente->Clave_Cliente)->get();
            return view('perfil.cliente', [
                'cliente'=> $cliente, 
                'rutinas' => $rutinas,
                'entrenamientos' => $entrenamientos,
                'valoraciones' => $valoraciones
            ]);
        }else{
            $cliente = DB::table('entrenadors')->where('Correo_Entrenador',$nombre->email)->first();
            
            if($cliente){
                return view('perfil.entrenador', [
                    'cliente'=> $cliente
                ]);
            }else{
                $cliente = DB::table('administradors')->where('Correo_Administrador',$nombre->email)->first();
                return view('perfil.admin', [
                    'cliente'=> $cliente
                ]);
            }
            
        }
        
    }

    public function create(){
        return view('auth.login');
    }

    public function store() {
        $credentials = request()->only('email', 'password');
        $cliente = DB::table('clientes')->where('Correo_Cliente',request()->only('email'))->first();
        $message = 'Correo o contraseña incorrectos, intente de nuevo';
        if($cliente){
            if($cliente->Estado == 0){
                return back() -> withErrors([
                    'message' => 'membresia vencida, favor acercate al gimnasio para renovarla'
                ]);
            }
        }

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();

            return redirect('perfil');
        }else{
            return back() -> withErrors([
                'message' => $message
            ]);
        }

    }

    public function destroy() {
        auth() -> logout();

        return redirect() -> to('/');
    }

    public function recuperarContrasena(){
        return view('auth.recuperacion_contrasena');
    }

    public function enviarNuevaContrasena(Request $request){
        $validaData = $request->validate([
            'email' => 'required|email|comfirmed'
        ]);

        return redirect('auth.login');
    }
}
