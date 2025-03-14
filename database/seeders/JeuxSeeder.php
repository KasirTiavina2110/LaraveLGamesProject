<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JeuxSeeder extends Seeder
{
    public function run()
    {
        $games = [
            [
                'titre' => 'EA Sports FC 25',
                'description' => 'Jeu de simulation de football très réaliste.',
                'taille' => 50,
                'categorie' => 'Sport',
                'realisateur' => 'EA Sports',
                'zip' => 'EA25.zip',
            ],
            [
                'titre' => 'Helldivers 2',
                'description' => 'Jeu de tir coopératif dans un univers galactique.',
                'taille' => 35,
                'categorie' => 'Action',
                'realisateur' => 'Arrowhead Game Studios',
                'zip' => 'helldivers2.zip',
            ],
            [
                'titre' => 'Ghost of Tsushima',
                'description' => 'Jeu d\'action-aventure inspiré du Japon féodal.',
                'taille' => 40,
                'categorie' => 'Aventure',
                'realisateur' => 'Sucker Punch Productions',
                'zip' => 'GhostofTsushima.zip',
            ],
            [
                'titre' => 'Paper Mario: The Thousand-Year Door',
                'description' => 'Un RPG coloré mettant en scène Mario.',
                'taille' => 3,
                'categorie' => 'RPG',
                'realisateur' => 'Intelligent Systems',
                'zip' => 'papermario.zip',
            ],
            [
                'titre' => 'Dragon\'s Dogma 2',
                'description' => 'Jeu d\'action RPG avec un monde ouvert immersif.',
                'taille' => 50,
                'categorie' => 'RPG',
                'realisateur' => 'Capcom',
                'zip' => 'dragonsdogma2.zip',
            ],
            [
                'titre' => 'Prince of Persia: The Lost Crown',
                'description' => 'Retour de la célèbre série Prince of Persia.',
                'taille' => 25,
                'categorie' => 'Aventure',
                'realisateur' => 'Ubisoft',
                'zip' => 'princeofpersia.zip',
            ],
            [
                'titre' => 'World of Warcraft: The War Within',
                'description' => 'Nouvelle extension du MMORPG légendaire.',
                'taille' => 70,
                'categorie' => 'MMORPG',
                'realisateur' => 'Blizzard Entertainment',
                'zip' => 'wow.zip',
            ],
            [
                'titre' => 'Fortnite',
                'description' => 'Jeu de battle royale très populaire.',
                'taille' => 40,
                'categorie' => 'Battle Royale',
                'realisateur' => 'Epic Games',
                'zip' => 'Fortnite.zip',
            ],
            [
                'titre' => 'The Plucky Squire',
                'description' => 'Jeu d\'aventure avec des transitions entre 2D et 3D.',
                'taille' => 10,
                'categorie' => 'Aventure',
                'realisateur' => 'Devolver Digital',
                'zip' => 'pluckysquire.zip',
            ],
            [
                'titre' => 'League of Legends',
                'description' => 'MOBA très compétitif avec une grande communauté.',
                'taille' => 15,
                'categorie' => 'MOBA',
                'realisateur' => 'Riot Games',
                'zip' => 'LOL.zip',
            ],
        ];

        DB::table('jeux')->insert($games);
    }
}
