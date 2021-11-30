<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'nik'=>'3213072012990007',
            'name' => 'Sahrul Ramdan',
            'email' => 'sahrulramdan.75@gmail.com',
            'password' => bcrypt('qwopqwop'),
            'foto_ktp' => '/img/ktp.png',
            'level'=> true,
        ]);
        User::create([
            'nik'=>'3213072012990008',
            'name' => 'User 000',
            'email' => 'user@gmail.com',
            'password' => bcrypt('qwopqwop'),
            'foto_ktp' => '/img/ktp.png',
        ]);
    }
}
