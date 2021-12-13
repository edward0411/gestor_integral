<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder

{
    
    public function run()
    {
        $superadmin = Role::create(['name' => 'Administrador']);
        $superadmin->givePermissionTo(Permission::all());
        $config = Role::create(['name' => 'Configuracion']);
        $comercial = Role::create(['name' => 'Comercial']);
        $client = Role::create(['name' => 'Cliente']);
        $monitor = Role::create(['name' => 'Monitor']);
        $tutor = Role::create(['name' => 'Tutor']);
    }
}
