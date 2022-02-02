<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder

{

    public function run()
    {
        // permisos

        Permission::create(['name' => 'Administrador']);

        Permission::create(['name' => 'Administrador_clientes_ver']);
        Permission::create(['name' => 'Administrador_clientes_crear']);
        Permission::create(['name' => 'Administrador_clientes_editar']);
        Permission::create(['name' => 'Administrador_clientes_activar']);
        Permission::create(['name' => 'Administrador_clientes_inactivar']);

        Permission::create(['name' => 'Administrador_tutores_ver']);
        Permission::create(['name' => 'Administrador_tutores_crear']);
        Permission::create(['name' => 'Administrador_tutores_editar']);
        Permission::create(['name' => 'Administrador_tutores_activar']);
        Permission::create(['name' => 'Administrador_tutores_inactivar']);

        Permission::create(['name' => 'Administrador_empleados_ver']);
        Permission::create(['name' => 'Administrador_empleados_crear']);
        Permission::create(['name' => 'Administrador_empleados_editar']);
        Permission::create(['name' => 'Administrador_empleados_eliminar']);

        Permission::create(['name' => 'Administrador_roles_ver']);
        Permission::create(['name' => 'Administrador_roles_crear']);
        Permission::create(['name' => 'Administrador_roles_editar']);
        Permission::create(['name' => 'Administrador_roles_eliminar']);

        Permission::create(['name' => 'Administrador_paises_ver']);
        Permission::create(['name' => 'Administrador_paises_crear']);
        Permission::create(['name' => 'Administrador_paises_editar']);
        Permission::create(['name' => 'Administrador_paises_eliminar']);

        Permission::create(['name' => 'Administrador_parametricas_ver']);
        Permission::create(['name' => 'Administrador_parametricas_crear']);
        Permission::create(['name' => 'Administrador_parametricas_editar']);
        Permission::create(['name' => 'Administrador_parametricas_eliminar']);

        Permission::create(['name' => 'Administrador_monedas_ver']);
        Permission::create(['name' => 'Administrador_monedas_crear']);
        Permission::create(['name' => 'Administrador_monedas_editar']);
        Permission::create(['name' => 'Administrador_monedas_eliminar']);
        Permission::create(['name' => 'Administrador_monedas_inactivar']);
        Permission::create(['name' => 'Administrador_monedas_activar']);

        Permission::create(['name' => 'Administrador_areas_ver']);
        Permission::create(['name' => 'Administrador_areas_crear']);
        Permission::create(['name' => 'Administrador_areas_editar']);
        Permission::create(['name' => 'Administrador_areas_eliminar']);

        Permission::create(['name' => 'Preregistro']);

        Permission::create(['name' => 'Preregistro_historial_ver']);
        Permission::create(['name' => 'Preregistro_listado_ver']);

        Permission::create(['name' => 'Perfil']);

        Permission::create(['name' => 'Perfil_datosBasicos_ver']);
        Permission::create(['name' => 'Perfil_bonos_ver']);

        Permission::create(['name' => 'Comunicaciones']);

        Permission::create(['name' => 'Comunicaciones_bandeja']);

        //Segunda ronda de permisos

        Permission::create(['name' => 'Cotizaciones']);
        Permission::create(['name' => 'Cotizaciones_pendientes_ver']);
        Permission::create(['name' => 'Cotizaciones_historial_ver']);
        Permission::create(['name' => 'Cotizaciones_misCotizaciones_ver']);
        Permission::create(['name' => 'Billetera_virtual']);
        Permission::create(['name' => 'Billetera_virtual_miBilletera_ver']);
        Permission::create(['name' => 'Billetera_virtual_HistoriarPagos_ver']);
        Permission::create(['name' => 'Pagos']);
        Permission::create(['name' => 'Pagos_HistorialPagosClientes_ver']);
        Permission::create(['name' => 'Reportes']);
        Permission::create(['name' => 'Reportes_Listado_ver']);





        $superadmin = Role::create(['name' => 'Administrador']);
        $superadmin->givePermissionTo(Permission::all());
        $config     = Role::create(['name' => 'Configuracion']);
        $comercial  = Role::create(['name' => 'Comercial']);
        $client     = Role::create(['name' => 'Cliente']);
        $monitor    = Role::create(['name' => 'Monitor']);
        $tutor      = Role::create(['name' => 'Tutor']);
    }
}
