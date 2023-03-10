<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('123456789'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'role' => 2,
            'password' => Hash::make('123456789'),
        ]);
    }
}
