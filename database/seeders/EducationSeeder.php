<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table("educations")->insert([
            [
                "institution" => "Uds de Dchang",
                'period' => '2016-2019',                
                'degree' => 'Master of Science',                
                'department' => 'Computer Science',                
            ],
           
        ]);
    }
}
