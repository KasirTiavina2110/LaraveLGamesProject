<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursSeeder extends Seeder
{
    public function run()
    {
        $cours = [
            [
                'titre' => 'Programmation Orientée Objet',
                'description' => 'Introduction aux concepts de la POO avec des exemples en Java.',
            ],
            [
                'titre' => 'Développement Web',
                'description' => 'Création d\'applications web avec HTML, CSS, JavaScript, et PHP.',
            ],
            [
                'titre' => 'Base de Données',
                'description' => 'Concepts fondamentaux des bases de données relationnelles avec SQL.',
            ],
            [
                'titre' => 'Réalité Virtuelle',
                'description' => 'Exploration des technologies de la réalité virtuelle et augmentée.',
            ],
            [
                'titre' => 'Intelligence Artificielle',
                'description' => 'Introduction aux algorithmes d\'apprentissage automatique.',
            ],
            [
                'titre' => 'Programmation de Jeux Vidéo',
                'description' => 'Apprentissage de la conception et du développement de jeux vidéo avec Unity et Unreal Engine.',
            ],
        ];

        DB::table('cours')->insert($cours);
    }
}
