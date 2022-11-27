<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Sanchez',
            'email' => 'admin@gimapp.com',
            'password' => 'nana'
        ])->assignRole('Admin');

        Cliente::create([
            'Clave_Cliente' => '101525465',
            'Nombre_Cliente' => 'Juan Sanchez',
            'Telefono_Cliente' => '325161',
            'Direccion_Cliente' => '561651651',
            'Correo_Cliente' => 'admin@gimapp.com',
            'Edad_ACliente' => '20',
            'Suscripcion_Cliente' => 'anual',
            'Fecha_Pago_Cliente' => '2022-10-15'
        ]);
    }
}
