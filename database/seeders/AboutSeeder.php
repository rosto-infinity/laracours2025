<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("abouts")->insert([
            [
                "name" => "Waffo lele",
                'home_image' => 'not-image.png',
                'banner_image' => 'not-image.png',
                'phone' => '123-456-7890',
                'email' => 'waffo@lele.com',
                'address' => '123 Rue Exemple, Ville, Pays',
                'description' => 'Développeur Web FullStack, avec de vastes connaissances et des années d\'expérience, travaillant dans les technologies Web et la conception UI/UX, fournissant un travail de qualité.',
                'summary' => 'Résumé court de Waffo lele.',
                'tagline' => 'Votre succès, notre passion.',
                'cv' => 'waffo-cv.pdf'

            ]
        ]);
    }
}
