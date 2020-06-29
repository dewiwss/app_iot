<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        // \DB::table('users')->insert(array (
        //     0 =>
        //     array (
        //         'id' => 1,
        //         'name' => 'user',
        //         'email' => 'user@email.com',
        //         'email_verified_at' => NULL,
        //         'password' => bcrypt('user123'),
        //         'role' => 'user',
        //         'remember_token' => NULL,
        //         'created_at' => '2020-06-25 09:38:22',
        //         'updated_at' => '2020-06-25 09:38:22',
        //     ),
        //     1 =>
        //     array (
        //         'id' => 2,
        //         'name' => 'admin',
        //         'email' => 'admin@email.com',
        //         'email_verified_at' => NULL,
        //         'password' => bcrypt('admin123'),
        //         'role' => 'admin',
        //         'remember_token' => NULL,
        //         'created_at' => '2020-06-25 10:38:22',
        //         'updated_at' => '2020-06-25 10:38:22',
        //     ),
        // ));


        $admin = User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'remember_token' => NULL,
            'created_at' => '2020-06-25 10:38:22',
            'updated_at' => '2020-06-25 10:38:22',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'id' => 2,
            'name' => 'User',
            'email' => 'user@email.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('user123'),
            'role' => 'user',
            'remember_token' => NULL,
            'created_at' => '2020-06-25 10:38:22',
            'updated_at' => '2020-06-25 10:38:22',
        ]);

        $user->assignRole('user');


    }
}
