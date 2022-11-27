<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Trainer']);
        $role3 = Role::create(['name' => 'Client']);
        
        Permission::create(['name' => 'recurso.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recurso.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'recurso.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'recurso.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'ejercicio.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ejercicio.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ejercicio.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ejercicio.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'rutina.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rutina.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rutina.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rutina.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rutina.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'entrenador.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'entrenador.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'entrenador.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'entrenador.show.admin'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'entrenador.show.cliente'])->syncRoles([$role3]);
        Permission::create(['name' => 'entrenador.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'cliente.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'cliente.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'clase.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'clase.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'clase.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'clase.inscribirCliente'])->syncRoles([$role3]);
        Permission::create(['name' => 'clase.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'trainer.admin'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cliente'])->syncRoles([$role3]);

    }
}
