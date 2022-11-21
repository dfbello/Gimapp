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

        Permission::create(['name' => 'trainer.cliente']);

        Permission::create(['name' => 'trainer.cliente.index']);
        Permission::create(['name' => 'trainer.cliente']);
        Permission::create(['name' => 'trainer.cliente']);
        Permission::create(['name' => 'trainer.cliente']);
        Permission::create(['name' => 'trainer.cliente']);
    }
}
