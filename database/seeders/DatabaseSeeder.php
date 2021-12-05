<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shift;
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
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'email' => 'sahrulramdan.75@gmail.com',
            'jenis_kelamin'=>'Laki-Laki',
            'password' => bcrypt('qwopqwop'),
            'tanggal_lahir' => '1997-10-03',
            'level'=> true,
        ]);
        User::create([
            'nik'=>'3213072012990008',
            'name' => 'User 000',
            'email' => 'user@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990010',
            'name' => 'User 001',
            'email' => 'user1@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990011',
            'name' => 'User 002',
            'email' => 'user2@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990012',
            'name' => 'User 003',
            'email' => 'user3@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990013',
            'name' => 'User 004',
            'email' => 'user4@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990014',
            'name' => 'User 005',
            'email' => 'user5@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990015',
            'name' => 'User 006',
            'email' => 'user6@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990016',
            'name' => 'User 007',
            'email' => 'user7@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990017',
            'name' => 'User 008',
            'email' => 'user8@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990018',
            'name' => 'User 009',
            'email' => 'user9@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);
        User::create([
            'nik'=>'3213072012990019',
            'name' => 'User 010',
            'email' => 'user10@gmail.com',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir' => '1997-10-03',
            'alamat' => 'Kp. Sembung 2 RT 07/04 Desa Gunung Sembung Kec. Pagaden, Kab. Subang ',
            'password' => bcrypt('qwopqwop'),
        ]);

        Shift::create([
            'shift' => 1,
            'jam_masuk' => '07:00:00',
            'jam_keluar' => '12:00:00'
        ]);
        Shift::create([
            'shift' => 2,
            'jam_masuk' => '12:00:00',
            'jam_keluar' => '17:00:00'
        ]);
    }
}
