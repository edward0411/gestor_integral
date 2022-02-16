<?php

use App\Models\Deliverable;
use App\Models\RequestQuote;
use App\Models\WalletDetail;
use App\Models\WalletVirtual;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // trabajos
        for ($i=0; $i <3; $i++) {
            Work::create([
                'start_date'                 => Carbon::now(),
                'end_date'                   => Carbon::now(),
                'request_quote_id'           => RequestQuote::all()->random()->id,
            ]);
        }

        // entregables
        for ($i=0; $i <3; $i++) {
            Deliverable::create([
                'date_delivery'         => Carbon::now(),
                'status'                => collect([1,2])->random(),
                'status_deliverable'    => collect([1,2,3])->random(),
                'work_id'               => Work::all()->random()->id,
            ]);
        }

        // billetera virtual
        for ($i=0; $i <3; $i++) {
            WalletVirtual::create([
                'deliverable_id'        => Deliverable::all()->random()->id,
            ]);
        }

         // detalle de la billetera virutal
        for ($i=0; $i <3; $i++) {
            WalletDetail::create([
                'value'                    => rand(50000, 100000),
                'reference'                => collect(['SAB', 'XG', 'ASJ'])->random().rand(50000, 100000),
                'wallet_virtual_id'        => WalletVirtual::all()->random()->id,
            ]);
        }

    }
}
