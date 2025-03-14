<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeEtudiantSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs des groupes existants
        $groupes = DB::table('groupes')->pluck('id_groupe')->toArray();

        // Récupérer les IDs des usagers étudiants
        $etudiants = DB::table('usagers')
            ->where('type_usager', 'étudiant')
            ->pluck('id')
            ->toArray();

        // Associer chaque étudiant à un groupe aléatoire
        foreach ($etudiants as $etudiant) {
            DB::table('groupe_etudiants')->insert([
                'groupe_id' => $groupes[array_rand($groupes)],  // Groupe aléatoire
                'usager_id' => $etudiant,
            ]);
        }
    }
}
