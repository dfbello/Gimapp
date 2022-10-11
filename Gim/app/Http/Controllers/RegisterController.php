<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
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
        $cliente->Contrasenia_Cliente = $request->get('password');
        $cliente->Suscripcion_Cliente = $request->get('plan');
        
        $cliente->save();
        
        $user = User::create(request(['name', 'email', 'password']));

        return redirect()->to('/login');
        
    }
}
