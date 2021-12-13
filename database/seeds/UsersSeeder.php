<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'u_key_number' => '3103332244',
            'u_indicativo' => '+57',
            'u_name' => 'Soporte Testing',
            'u_nickname' => 'Soporte_test',
            'u_type_doc' => '5',
            'u_num_doc' => '1234567890',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'soporte.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole('Administrador');
    }
}
