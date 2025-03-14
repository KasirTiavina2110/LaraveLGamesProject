<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsagersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR');

        // Vérifier et insérer le professeur existant
        $professeur = DB::table('usagers')->where('matricule', 'P12345')->first();
        if (!$professeur) {
            DB::table('usagers')->insert([
                'matricule' => 'P12345',
                'type_usager' => 'professeur',
                'email' => $faker->unique()->safeEmail(),
                'mdp' => Hash::make('password'), // Mot de passe crypté
                'programme' => null,
                'nom' => $faker->lastName(),
                'prenom' => $faker->firstName(),
                'remember_token' => null,
            ]);
        }

        // Ajouter le professeur spécifique Tiavina Kasir
        $tiavina = DB::table('usagers')->where('matricule', 'P2110')->first();
        if (!$tiavina) {
            DB::table('usagers')->insert([
                'matricule' => 'P2110',
                'type_usager' => 'professeur',
                'email' => 'tiavinakasir@gmail.com',
                'mdp' => Hash::make('12345678'),
                'programme' => 'Informatique',
                'nom' => 'Kasir',
                'prenom' => 'Tiavina',
                'remember_token' => null,
            ]);
        }

        echo "Professeur Tiavina Kasir ajouté si non existant.\n";

        // Ajouter 5 étudiants spécifiques
        for ($i = 1; $i <= 5; $i++) {
            $matricule = 'E000' . $i;
            $etudiant = DB::table('usagers')->where('matricule', $matricule)->first();

            if (!$etudiant) {
                $plainPassword = 'etudiant' . $i;
                DB::table('usagers')->insert([
                    'matricule' => $matricule,
                    'type_usager' => 'étudiant',
                    'email' => $faker->unique()->safeEmail(),
                    'mdp' => Hash::make($plainPassword),
                    'programme' => 'Informatique',
                    'nom' => $faker->lastName(),
                    'prenom' => $faker->firstName(),
                    'remember_token' => null,
                ]);

                echo "Étudiant {$matricule} ajouté avec mot de passe : {$plainPassword}\n";
            } else {
                echo "Étudiant {$matricule} déjà existant, non ajouté.\n";
            }
        }
    }
}
