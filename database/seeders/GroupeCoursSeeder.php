<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeCoursSeeder extends Seeder
{
    public function run()
    {
        // Obtenir les IDs des groupes existants
        $groupes = DB::table('groupes')->pluck('id_groupe')->toArray();

        // Obtenir les IDs des cours existants
        $cours = DB::table('cours')->pluck('id_cours')->toArray();

        // Associer chaque groupe avec deux cours différents
        foreach ($groupes as $groupe) {
            $coursSelectionnes = array_rand($cours, 2);  // Sélectionner deux cours aléatoires

            // Insérer les deux associations de groupe-cours
            DB::table('groupe_cours')->insert([
                [
                    'groupe_id' => $groupe,
                    'cours_id' => $cours[$coursSelectionnes[0]],
                ],
                [
                    'groupe_id' => $groupe,
                    'cours_id' => $cours[$coursSelectionnes[1]],
                ],
            ]);
        }
    }
}
