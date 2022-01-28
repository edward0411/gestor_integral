<?php

use App\Models\RequestState;
use Illuminate\Database\Seeder;

class RequestStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count(RequestState::NAME); $i++) {
            RequestState::create([
                'name'  => RequestState::NAME[$i],
            ]);
        }
    }
}
