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
            'p_category' => 'means_type',
            'p_text' => 'Facebook',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Google',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Instagram',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Tic Tok',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Referido',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Linkedin',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Aviso Físico',
            'p_order' => 400,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'means_type',
            'p_text' => 'Otro',
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
            'p_text' => 'Banco agrario',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Av Villas',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'BBVA',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco BCSC',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Caja Social',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Citibank',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Coopcentral',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Davivienda',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco de Bogotá',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco de la República',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco de Occidente',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Falabella',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Finandina',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco GNB Sudameris',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Itaú corpbanca coalombia S.A',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Mundo Mujer',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Pichincha',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Popular',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Santander de Negocios Colombia S.A.',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Serfinanza',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Bancolombia',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Bancoomeva',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco JP Morgan Colombia',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Nequi',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Daviplata',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Colpatria',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Nacional de México (Banamex)',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Banco Santander (México)',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'HSBC México.',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'BBVA Bancomer.',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_banks',
            'p_text' => 'Paypal',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Ahorros',
            'p_order' => 100,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Crédito',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Vista',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_type_acount',
            'p_text' => 'Debito',
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
            'p_category' => 'param_list_languages',
            'p_text' => 'Alemán',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Francés',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Inglés',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Italiano',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Mandarín',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_languages',
            'p_text' => 'Portugués',
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
            'p_category' => 'param_list_systems',
            'p_text' => 'Adobe',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Arcgis',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Arena',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Atlas TI',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Autocad',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'C++',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Civil 3d',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Dialux',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Diseño grafico editorial',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Epanet',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Erdas',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Ess',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Evievws',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Global mapper',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Visual',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Statgraphic',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Global mapper',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Ilustrator',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Indesing',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Latex',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Lt spice',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Matlab',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Multisim',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Netbeans',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Ni',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Octave',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Orcad',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Project power bi',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Promodel',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Proteus',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Python',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Qgis',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'R',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Solid edgel',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Solidworks',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'SPSS',
            'p_order' => 200,
            'created_by' => 1
          ]);

          DB::table('parametrics')->insert([
            'p_category' => 'param_list_systems',
            'p_text' => 'Stata',
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
