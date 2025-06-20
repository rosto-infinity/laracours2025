<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("testimonials")->insert([
            [
                "name" => "Waffo lele",
                'function' => 'Design',                
                'testimony' => 'Software Enginneroftware Enginneroftware Enginner',                             
                'rating' => '7',                             
                'image' => 'avatar.php',                             
            ],
           
        ]);
    }
}
