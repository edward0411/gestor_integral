<?php

use App\Models\Areas;
use App\Models\Subjects;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count(Subjects::NAME); $i++) {
            Subjects::create([
                's_name'        => Subjects::NAME[$i],
                'id_area'       => Areas::all()->first()['id'],
                's_order'       => 100,
                's_state'       => Subjects::ACTIVO
            ]);
        }
    }
}
