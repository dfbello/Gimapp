<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroExitoso;

class RegisterController extends Controller
{

    public function create(){
        return view('auth.register',[
            'user' =>''
        ]);
    }

    public function store(Request $request){
        
        $validaData = $request->validate([
            'cedula' => 'required|integer|digits_between:6,10',
            'name' => 'required|min:2|string',
            'celular' => 'required|digits:10|integer',
            'direccion' => 'required|string',
            'email' => 'required|email|unique:users',
            'edad' => 'required|min:14|max:99|integer',
            'password' => 'min:3|required|confirmed',
            'plan' => 'required'
        ]);

        $cliente = new Cliente();
        $cliente->Clave_Cliente = $request->get('cedula');
        $cliente->Nombre_Cliente = $request->get('name');
        $cliente->Telefono_Cliente = $request->get('celular');
        $cliente->Direccion_Cliente = $request->get('direccion');
        $cliente->Correo_Cliente = $request->get('email');
        $cliente->Edad_ACliente = $request->get('edad');
        $cliente->Suscripcion_Cliente = $request->get('plan');
        $cliente->Fecha_Pago_Cliente = date('Y-m-d');
        $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 1 month")); 
         
        if($request->get('plan') == 'mensual'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 1 month")); 
        }elseif($request->get('plan') == 'trimestral'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 3 month")); 
        }elseif($request->get('plan') == 'semestral'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 6 month"));  
        }elseif($request->get('plan') == 'anual'){
            $fvp = date('Y-m-d',strtotime(date('Y-m-d')."+ 12 month"));  
        }

        $cliente->Fecha_Vence_Pago_Cliente =$fvp;

        $cliente -> Estado = true; 
        
        $cliente->save();
        
        Mail::to($request->get('email'))->send(new RegistroExitoso($cliente));

        $user = User::create(request(['name', 'email', 'password']))->assignRole('Client');

        return view('auth.register',[
            'user' =>$user
        ]);
        
    }
}
