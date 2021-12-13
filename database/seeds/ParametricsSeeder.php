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
    }
}
