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
        // ADMIN
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

        //CLIENTES
        $user = User::create([
            'u_key_number' => '21033322441',
            'u_indicativo' => '+57',
            'u_name' => 'Client1 Testing',
            'u_nickname' => 'Client_test1',
            'u_type_doc' => '5',
            'u_num_doc' => '12123123121',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'cliente1.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Cliente');

        $user = User::create([
            'u_key_number' => '31033322424',
            'u_indicativo' => '+57',
            'u_name' => 'Client2 Testing',
            'u_nickname' => 'Client_test2',
            'u_type_doc' => '5',
            'u_num_doc' => '1212121212',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'cliente2.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Cliente');

        // TUTORES
        $user = User::create([
            'u_key_number' => '310333223',
            'u_indicativo' => '+57',
            'u_name' => 'Tutor2 Testing',
            'u_nickname' => 'Tutor_test1',
            'u_type_doc' => '5',
            'u_num_doc' => '121212121',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'Tutor2.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Tutor');

        $user = User::create([
            'u_key_number' => '3103332334',
            'u_indicativo' => '+57',
            'u_name' => 'Tutor2 Testing',
            'u_nickname' => 'Tutor_test2',
            'u_type_doc' => '5',
            'u_num_doc' => '121212126996',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'Tutor2.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Tutor');

        // COMERCIALES
         $user = User::create([
            'u_key_number' => '310333220080',
            'u_indicativo' => '+57',
            'u_name' => 'Comercial2 Testing',
            'u_nickname' => 'Comercial_test1',
            'u_type_doc' => '5',
            'u_num_doc' => '12121219692',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'Comercial2.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Comercial');

        $user = User::create([
            'u_key_number' => '3103332979724',
            'u_indicativo' => '+57',
            'u_name' => 'Comercial2 Testing',
            'u_nickname' => 'Comercial_test2',
            'u_type_doc' => '5',
            'u_num_doc' => '121215757212',
            'u_id_country' => '8',
            'u_id_means' => '1',
            'u_id_money' => '17',
            'u_state' => '1',
            'email' => 'Comercial2.test@gestorintegarl.com',
            'created_by' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole('Comercial');
    }
}
