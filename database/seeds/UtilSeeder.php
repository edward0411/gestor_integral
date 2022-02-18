<?php

use App\Models\BondQuote;
use App\Models\Bonds;
use App\Models\Coins;
use App\Models\Parametrics;
use App\Models\Payment as ModelsPayment;
use App\Models\Request;
use App\Models\RequestQuote;
use App\Models\RequestQuoteTutor;
use App\Models\RequestState;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UtilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bonos
        for ($i=0; $i <3; $i++) {
            Coins::create([
                'c_currency'                => collect(['COLOMBIA', 'USD','MXN'])->random(),
                'c_type_currency'           => collect(['CO', 'USD','MXN'])->random(),
                'c_trm_currency'            => rand(500, 10000),
                'c_order'                   => 100,
                'c_state'                   => 1,

            ]);
            Bonds::create([
                'b_value'                   => rand(500, 10000),
                'b_state'                   => 1,
                'id_user'                   => User::all()->random()->id,
                'id_coin'                   => Coins::all()->random()->id,
                'id_type_bond'              => Parametrics::handleCategory('param_type_bonds')->get()->random()->id,
                'id_type_value'             => Parametrics::handleCategory('param_type_value')->get()->random()->id,

            ]);
        }

        // solicitudes
        for ($i=0; $i <3; $i++) {
            Request::create([
                'date_delivery'     => Carbon::now(),
                'observation'       => collect(['Todo bien', 'por favor evaluar presupuesto','todo indica que esta bien'])->random(),
                'type_service_id'   => Parametrics::handleCategory('param_list_services')->get()->random()->id,
                'request_state_id'  => RequestState::handleState('CREADA')->first()['id'],
                'user_id'           => User::all()->random()->id,
            ]);
        }

        // cotizaciones del tutor
        for ($i=0; $i <3; $i++) {
            RequestQuoteTutor::create([
                'value'             => rand(20000, 50000),
                'observation'       => collect(['Todo bien', 'por favor evaluar presupuesto','todo indica que esta bien'])->random(),
                'request_id'        => Request::all()->random()->id,
                'application_date'  => Carbon::now(),
                'user_id'           => User::all()->random()->id,
            ]);
        }

        // cotizaciones reales
        for ($i=0; $i <3; $i++) {
            RequestQuote::create([
                'value'                     => rand(50000, 100000),
                'value_utility'             => rand(3000, 20000),
                'private_note'              => collect(['Todo bien', 'por favor evaluar presupuesto','todo indica que esta bien'])->random(),
                'observation'               => collect(['Todo bien', 'por favor evaluar presupuesto','todo indica que esta bien'])->random(),
                'request_quote_tutor_id'    => RequestQuoteTutor::all()->random()->id,
                'utility_type_id'           => Parametrics::handleCategory('param_type_value')->get()->random()->id,
            ]);
        }

        // Bonos que tiene una cotización
        for ($i=0; $i <3; $i++) {
            BondQuote::create([
                'bond_id'               => Bonds::all()->random()->id,
                'request_quote_id'      => RequestQuote::all()->random()->id,
            ]);
        }

        // Pagos
        for ($i=0; $i <3; $i++) {
            ModelsPayment::create([
                'value'                 => rand(50000, 100000),
                'payment_reference'     => collect(['SAB', 'XG', 'ASJ'])->random().rand(50000, 100000),
                'observation'           => collect(['Todo bien', 'por favor evaluar presupuesto','todo indica que esta bien'])->random(),
                'request_quote_id'      => RequestQuote::all()->random()->id,
                'value'                 => rand(50000, 100000),
                'payment_type'          => collect(['PARCIAL','TOTAL'])->random(),
                'request_quote_id'      => RequestQuote::all()->random()->id,
            ]);
        }
    }
}
