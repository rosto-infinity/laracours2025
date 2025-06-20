<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("experiences")->insert([
            [
                "company" => "Ecole Superieure la canadienne",
                'period' => '2016-2019',                
                'position' => 'Software Enginner',                             
            ],
           
        ]);
    }
}
