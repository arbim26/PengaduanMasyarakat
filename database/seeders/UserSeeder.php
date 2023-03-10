<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '320826611840001',
            'name' => 'Meda',
            'email' => 'meda@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'nik' => '320826611840002',
            'name' => 'Bima',
            'email' => 'bima@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'nik' => '320826611840003',
            'name' => 'Raya',
            'email' => 'raya@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'nik' => '320826611840004',
            'name' => 'Nena',
            'email' => 'nena@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'nik' => '320826611840005',
            'name' => 'Muti',
            'email' => 'muti@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
