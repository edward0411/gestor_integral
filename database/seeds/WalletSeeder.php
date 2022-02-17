<?php

use App\Models\Deliverable;
use App\Models\RequestQuote;
use App\Models\WalletDetail;
use App\Models\WalletVirtual;
use App\Models\Work;
use App\Models\WorkDetail;
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
        for ($i=1; $i <=3; $i++) {
            // trabajos
            Work::create([
                'start_date'                 => Carbon::now(),
                'end_date'                   => Carbon::now(),
                'request_quote_id'           => $i,
            ]);

            // entregables
            Deliverable::create([
                'date_delivery'         => Carbon::now(),
                'status'                => collect([1,2])->random(),
                'status_deliverable'    => collect([1,2,3])->random(),
                'work_id'               => $i,
            ]);
            // billetera virtual
            WalletVirtual::create([
                'work_id'               => Work::all()->random()->id,
            ]);

            WalletDetail::create([
                'value'                    => rand(50000, 100000),
                'reference'                => collect(['SAB', 'XG', 'ASJ'])->random().rand(50000, 100000),
                'wallet_virtual_id'        => WalletVirtual::all()->random()->id,
            ]);

            // detalles de trabajo
            WorkDetail::create([
                'work_id'               => Work::all()->random()->id,
            ]);
        }
    }
}
