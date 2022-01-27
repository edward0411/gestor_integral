<?php

use App\Models\Parametrics;
use App\Models\RequestQuestion;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // trabajo
        for ($i=0; $i <count(RequestQuestion::WORK); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::WORK[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Trabajo')->first()['id']
            ]);
        }

        // examenes
        for ($i=0; $i <count(RequestQuestion::EXAM); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::EXAM[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Examen')->first()['id']
            ]);
        }

        // tesis
        for ($i=0; $i <count(RequestQuestion::THESIS); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::THESIS[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Tesis')->first()['id']
            ]);
        }

        // materia
        for ($i=0; $i <count(RequestQuestion::MATTER); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::MATTER[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Materia virtual')->first()['id']
            ]);
        }

        // clases
        for ($i=0; $i <count(RequestQuestion::LESSONS); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::LESSONS[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Clase')->first()['id']
            ]);
        }

        // clases
        for ($i=0; $i <count(RequestQuestion::PROFESSIONAL); $i++) {
            RequestQuestion::create([
                'question'          => RequestQuestion::PROFESSIONAL[$i],
                'question_type'     => RequestQuestion::ABIERTA,
                'type_service_id'   => Parametrics::handleText('Servicio profesional')->first()['id']
            ]);
        }
    }
}
