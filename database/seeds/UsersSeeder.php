<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'u_key_number' => '3165349304',
            'u_name' => 'carlos leyva',
            'u_nickname' => 'carlos_11_leyva',
            'u_id_country' => 1,
            'email' => 'cjleyva0505@gmail.com',
            'password' => bcrypt('123456789'),
          ]);
    }
}
