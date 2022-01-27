<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Publicidad web',
            'p_order' => 100,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Llamada de campaña',
            'p_order' => 200,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Referido',
            'p_order' => 300,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Publicidad Mediatica',
            'p_order' => 400,
            'created_by' => 1
          ]);

        DB::table('parametrics')->insert([
            'p_category' => 'type_documents',
            'p_text' => 'Cédula Ciudadania',
            'p_order' => 100,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'type_documents',
            'p_text' => 'Pasaporte',
            'p_order' => 200,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'type_documents',
            'p_text' => 'NIT',
            'p_order' => 300,
            'created_by' => 1
          ]);
        DB::table('parametrics')->insert([
            'p_category' => 'type_documents',
            'p_text' => 'Cédula Extranjera',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Bancolombia s.a.',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Cuenta de Ahorros',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Cuenta Corriente',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Ingles',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Español',
            'p_order' => 200,
            'created_by' => 1
          ]);


          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Excell',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Word',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Clase',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Tesis',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Materia virtual',
            'p_order' => 300,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Trabajo',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Examen',
            'p_order' => 500,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_services',
            'p_text' => 'Servicio profesional',
            'p_order' => 600,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_value',
            'p_text' => 'Porcentaje',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_value',
            'p_text' => 'Valor',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_bonds',
            'p_text' => 'Bono',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_bonds',
            'p_text' => 'Anticipo',
            'p_order' => 200,
            'created_by' => 1
          ]);
    }
}
