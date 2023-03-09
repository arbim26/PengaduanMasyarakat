<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengaduan')->insert([
            'tgl_pengaduan' => '2023-03-05',
            'user_id' => '1',
            'isi_laporan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque purus semper eget duis at tellus. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Sed sed risus pretium quam vulputate dignissim suspendisse in. Quisque non tellus orci ac auctor augue mauris. Aliquet risus feugiat in ante metus dictum at. Urna molestie at elementum eu facilisis sed odio morbi quis. Amet nisl suscipit adipiscing bibendum est ultricies integer. Sed risus pretium quam vulputate dignissim suspendisse. Sit amet consectetur adipiscing elit pellentesque.',
            'foto' => 'n0Su9zA7uoEKYGTBljTZ4SJJzjXCWDxIvnDSwk7J.jpg',
            'status' => 'menunggu verifikasi',
        ]);
    }
}
