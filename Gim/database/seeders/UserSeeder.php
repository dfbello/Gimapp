<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Administrador;

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
            'password' => 'pass'
        ])->assignRole('Admin');

        Administrador::create([
            'Clave_Administrador' => '101525465',
            'Nombre_Administrador' => 'Juan Sanchez',
            'Telefono_Administrador' => '3154621645',
            'Direccion_Administrador' => '561651651',
            'Correo_Administrador' => 'admin@gimapp.com',
            'Edad_Administrador' => '20'
        ]);

        User::create([
            'name' => 'Juanito perez',
            'email' => 'trainer@gimapp.com',
            'password' => 'pass'
        ])->assignRole('Trainer');

        Entrenador::create([
            'Clave_Entrenador' => '101525465',
            'Nombre_Entrenador' => 'Juanito perez',
            'Telefono_Entrenador' => '3154621646',
            'Direccion_Entrenador' => '561651651',
            'Correo_Entrenador' => 'trainer@gimapp.com',
            'Edad_Entrenador' => '25',
            'Descripcion_Entrenador' => 'Entrenador especializado en acondicionamiento fisico de atletas con  5 años de experiencia',
            'Horario_Entrenador' => 'lunes a viernes 7am-5pm'
        ]);

        User::create([
            'name' => 'Julian Sanchez',
            'email' => 'cliente@correo.com',
            'password' => 'pass'
        ])->assignRole('Client');

        Cliente::create([
            'Clave_Cliente' => '165161561',
            'Nombre_Cliente' => 'Julian Sanchez',
            'Telefono_Cliente' => '3216549874',
            'Direccion_Cliente' => 'calle 1 # 50-5',
            'Correo_Cliente' => 'cliente@correo.com',
            'Edad_ACliente' => '21',
            'Suscripcion_Cliente' => 'trimestral',
            'Fecha_Pago_Cliente' => '2022-10-15'
        ]);
    }
}
