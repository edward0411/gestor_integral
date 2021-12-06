<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Countries;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::create([
            'c_name' => 'Estados Unidos',
        ]);
        Countries::create([
            'c_name' => 'España', 
        ]);
        Countries::create([
            'c_name' => 'Colombia', 
        ]);
        Countries::create([
            'c_name' => 'Peru', 
        ]);
        Countries::create([
            'c_name' => 'Brasil', 
        ]);
    }
}
