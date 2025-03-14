<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentairesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR');

        // Statique pour les IDs d'usagers et de jeux
        $usagersIds = DB::table('usagers')->pluck('id'); // Récupère les IDs des usagers
        $jeuxIds = DB::table('jeux')->pluck('id_jeu'); // Récupère les IDs des jeux

        // Insérer des commentaires pour chaque combinaison de jeu et usager
        foreach ($jeuxIds as $jeuId) {
            foreach ($usagersIds as $usagerId) {
                DB::table('commentaires')->insert([
                    'jeu_id' => $jeuId,
                    'usager_id' => $usagerId,
                    'contenu' => $faker->sentence(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
