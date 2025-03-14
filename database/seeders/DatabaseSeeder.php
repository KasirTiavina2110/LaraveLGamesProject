<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsagersSeeder::class,
            GroupesSeeder::class,
            CoursSeeder::class,
            JeuxSeeder::class,
            ImagesSeeder::class,
            VideosSeeder::class,
            CommentairesSeeder::class,
            RatingsSeeder::class,
            GroupeEtudiantSeeder::class,
            GroupeCoursSeeder::class,
        ]);
    }
}
