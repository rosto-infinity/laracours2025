<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("projects")->insert([
            [
                "image" => "no-image.pnp",
                'title' => 'Moderne Web Portfolio',                
                'description' => 'Moderne Web PortfolioModerne Web Portfolio',                
                'link' => 'htpps://github.con/portfolio',                
            ],
           
        ]);
    }
}
