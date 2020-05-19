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
            'password' => bcrypt('2d4dymfh'),
            // 'email_verified_at' => now(),
        ]);
    }
}
