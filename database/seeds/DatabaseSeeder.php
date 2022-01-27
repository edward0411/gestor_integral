<?php

use Illuminate\Database\Seeder;
// use Database\Seeder\AreaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CountriesSeeder::class);
        //$this->call(RolesSeeder::class);
        // $this->call(UsersSeeder::class);
        $this->call(ParametricsSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
