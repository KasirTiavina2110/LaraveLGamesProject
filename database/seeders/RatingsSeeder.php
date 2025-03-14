<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs réels des étudiants et des jeux
        $etudiantsIds = DB::table('usagers')->where('type_usager', 'étudiant')->pluck('id');
        $jeuxIds = DB::table('jeux')->pluck('id_jeu');

        // Insérer une note pour chaque étudiant et jeu
        foreach ($jeuxIds as $jeuId) {
            foreach ($etudiantsIds as $etudiantId) {
                DB::table('ratings')->insert([
                    'jeu_id' => $jeuId,
                    'usager_id' => $etudiantId,  // Utilisation correcte du champ `usager_id`
                    'note' => rand(1, 5),        // Note aléatoire entre 1 et 5
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
