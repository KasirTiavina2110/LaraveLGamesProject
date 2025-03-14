<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupesSeeder extends Seeder
{
    public function run()
    {
        DB::table('groupes')->insert([
            ['id_groupe' => 202400001, 'nom' => 'Groupe 01'],
            ['id_groupe' => 202400002, 'nom' => 'Groupe 02'],
        ]);
    }
}
