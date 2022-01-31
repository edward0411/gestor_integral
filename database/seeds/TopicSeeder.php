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
            $subject = Subjects::handleText(Topics::NAME[$i])->first();
            if($subject) $exist = $subject;

            if ($subject) {
                $data = [
                    't_name'        => Topics::NAME[$i],
                    'id_subject'    => $subject->id,
                    't_order'       => 100 * ($i+1),
                    't_state'       => Topics::ACTIVO
                ];
            }else{
                $data = [
                    't_name'        => Topics::NAME[$i],
                    'id_subject'    => $exist->id,
                    't_order'       => 100 * ($i+1),
                    't_state'       => Topics::ACTIVO
                ];
            }
            Topics::create($data);
        }
    }
}
