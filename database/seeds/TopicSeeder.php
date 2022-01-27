<?php

use App\Models\Subjects;
use App\Models\Topics;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count(Topics::NAME); $i++) {
            Topics::create([
                't_name'        => Topics::NAME[$i],
                'id_subject'    => Subjects::all()->first()['id'],
                't_order'       => 100,
                't_state'       => Topics::ACTIVO
            ]);
        }
    }
}
