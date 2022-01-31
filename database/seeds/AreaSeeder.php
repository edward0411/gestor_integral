<?php

use App\Models\Areas;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count(Areas::NAME); $i++) {
            Areas::create([
                'a_name'        => Areas::NAME[$i],
                'a_order'       => 100 * ($i+1),
                'a_state'       => Areas::ACTIVO
            ]);
        }
    }
}
