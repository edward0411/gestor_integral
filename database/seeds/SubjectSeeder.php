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
        // Ciencias Humanas
        for ($i=0; $i <count(Subjects::HUMAN_SCIENCE); $i++) {
            Subjects::create([
                's_name'        => Subjects::HUMAN_SCIENCE[$i],
                'id_area'       => Areas::handleText('Ciencias Humanas')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ciencias Sociales
        for ($i=0; $i <count(Subjects::SOCIAL_SCIENCE); $i++) {
            Subjects::create([
                's_name'        => Subjects::SOCIAL_SCIENCE[$i],
                'id_area'       => Areas::handleText('Ciencias Sociales')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Arte y Diseño
        for ($i=0; $i <count(Subjects::ART_AND_DESIGN); $i++) {
            Subjects::create([
                's_name'        => Subjects::ART_AND_DESIGN[$i],
                'id_area'       => Areas::handleText('Arte y Diseño')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Otras áreas
        for ($i=0; $i <count(Subjects::OTHER_AREAS); $i++) {
            Subjects::create([
                's_name'        => Subjects::OTHER_AREAS[$i],
                'id_area'       => Areas::handleText('Otras áreas')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ciencias Exactas
        for ($i=0; $i <count(Subjects::EXACT_SCIENCES); $i++) {
            Subjects::create([
                's_name'        => Subjects::EXACT_SCIENCES[$i],
                'id_area'       => Areas::handleText('Ciencias Exactas')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ciencias Económicas
        for ($i=0; $i <count(Subjects::ECONOMIC_SCIENCES); $i++) {
            Subjects::create([
                's_name'        => Subjects::ECONOMIC_SCIENCES[$i],
                'id_area'       => Areas::handleText('Ciencias Económicas')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ciencias de la Salud
        for ($i=0; $i <count(Subjects::HEALTH_SCIENCES); $i++) {
            Subjects::create([
                's_name'        => Subjects::HEALTH_SCIENCES[$i],
                'id_area'       => Areas::handleText('Ciencias de la Salud')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ciencias Legales
        for ($i=0; $i <count(Subjects::LEGAL_SCIENCES); $i++) {
            Subjects::create([
                's_name'        => Subjects::LEGAL_SCIENCES[$i],
                'id_area'       => Areas::handleText('Ciencias Legales')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Ingenierías y Arquitectura
        for ($i=0; $i <count(Subjects::ENGINEERING_ARCHITECTURE); $i++) {
            Subjects::create([
                's_name'        => Subjects::ENGINEERING_ARCHITECTURE[$i],
                'id_area'       => Areas::handleText('Ingenierías y Arquitectura')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Educación
        for ($i=0; $i <count(Subjects::EDUCATION); $i++) {
            Subjects::create([
                's_name'        => Subjects::EDUCATION[$i],
                'id_area'       => Areas::handleText('Educación')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }

        // Idiomas
        for ($i=0; $i <count(Subjects::LANGUAGE); $i++) {
            Subjects::create([
                's_name'        => Subjects::LANGUAGE[$i],
                'id_area'       => Areas::handleText('Idiomas')->first()['id'],
                's_order'       => 100 * ($i+1),
                's_state'       => Subjects::ACTIVO
            ]);
        }
    }
}
