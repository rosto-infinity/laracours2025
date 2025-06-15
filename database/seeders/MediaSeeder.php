<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("medias")->insert([
            [
                "link" => "https://www.facefook.com",
                'icon' => 'uil uil-facefook-f',                
            ],
            [
                "link" => "https://www.instagram.com",
                'icon' => 'uil uil-facefook-f',                
            ],
        ]);
    }
}
