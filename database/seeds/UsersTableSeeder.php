<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Augusto Santos',
            'email' => 'gugudam@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Augusto Santos',
            'email' => 'gugu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Alaf Santos',
            'email' => 'alafsatos@gmail.com',
            'password' => bcrypt('12345678'),
        ]);


    }
}
