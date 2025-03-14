<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            ['jeu_id' => 1, 'url' => 'https://www.youtube.com/watch?v=pBM2xyco_Kg&ab_channel=EASPORTSFC'], // Remplace XXXXXXX1 par l'ID de la vidéo
            ['jeu_id' => 1, 'url' => 'https://www.youtube.com/watch?v=xPS0bI_Q4BU&ab_channel=EASPORTSFC'],
            ['jeu_id' => 1, 'url' => 'https://www.youtube.com/watch?v=DHVbocAoi5E&ab_channel=Noori'],
            ['jeu_id' => 2, 'url' => 'https://www.youtube.com/watch?v=d645kJwc2s4&ab_channel=PlayStationFrance'],
            ['jeu_id' => 2, 'url' => 'https://www.youtube.com/watch?v=p0qyRzK3LUo&ab_channel=PlayStationFrance'],
            ['jeu_id' => 2, 'url' => 'https://www.youtube.com/watch?v=rE7KTE28HrA&ab_channel=PlayStation'],
            ['jeu_id' => 3, 'url' => 'https://www.youtube.com/watch?v=iqysmS4lxwQ&ab_channel=IGN'],
            ['jeu_id' => 3, 'url' => 'https://www.youtube.com/watch?v=nVhXp6FX7Y4&ab_channel=DKGames'],
            ['jeu_id' => 3, 'url' => 'https://www.youtube.com/watch?v=L8N0p0nJltg&ab_channel=FilmsActu'],
            ['jeu_id' => 4, 'url' => 'https://www.youtube.com/watch?v=sVCFBZl_RE4&ab_channel=NintendoFrance'],
            ['jeu_id' => 4, 'url' => 'https://www.youtube.com/watch?v=hKNUcwXeZCc&ab_channel=JV-JeuxVid%C3%A9o'],
            ['jeu_id' => 4, 'url' => 'https://www.youtube.com/watch?v=1wKxcIY8gnU&ab_channel=NintendoFrance'],
            ['jeu_id' => 5, 'url' => 'https://www.youtube.com/watch?v=cT0rIgaiPWA&ab_channel=PlayStation'],
            ['jeu_id' => 5, 'url' => 'https://www.youtube.com/watch?v=FSjOtp3QbiQ&ab_channel=PlayStation'],
            ['jeu_id' => 5, 'url' => 'https://www.youtube.com/watch?v=8dt1S_QUBYw&ab_channel=CapcomUSA'],
            ['jeu_id' => 6, 'url' => 'https://www.youtube.com/watch?v=MmX7a_e65uU&ab_channel=Ubisoft'],
            ['jeu_id' => 6, 'url' => 'https://www.youtube.com/watch?v=I-ra1bksSzs&ab_channel=IGN'],
            ['jeu_id' => 6, 'url' => 'https://www.youtube.com/watch?v=ZVZirQWSlD4&ab_channel=Ubisoft'],
            ['jeu_id' => 7, 'url' => 'https://www.youtube.com/watch?v=tBBEt8gfXks&ab_channel=WorldofWarcraft'],
            ['jeu_id' => 7, 'url' => 'https://www.youtube.com/watch?v=2BAG-G-qz_Y&ab_channel=WorldofWarcraft'],
            ['jeu_id' => 7, 'url' => 'https://www.youtube.com/watch?v=HjOuuo8awwg&ab_channel=WorldofWarcraftLatAm'],
            ['jeu_id' => 8, 'url' => 'https://www.youtube.com/watch?v=0fRBmXtfo_8&ab_channel=Fortnite'],
            ['jeu_id' => 8, 'url' => 'https://www.youtube.com/watch?v=5uE0XFJSVZA&ab_channel=Fortnite'],
            ['jeu_id' => 8, 'url' => 'https://www.youtube.com/watch?v=g909vB-BSXo&ab_channel=Fortnite'],
            ['jeu_id' => 9, 'url' => 'https://www.youtube.com/watch?v=Sxv072ksoMU&ab_channel=PlayStation'],
            ['jeu_id' => 9, 'url' => 'https://www.youtube.com/watch?v=4DpvZWrts_M&ab_channel=DevolverDigital'],
            ['jeu_id' => 9, 'url' => 'https://www.youtube.com/watch?v=0NHBiAp_DwM&ab_channel=PlayStation'],
            ['jeu_id' => 10, 'url' => 'https://www.youtube.com/watch?v=ZHhqwBwmRkI&ab_channel=LeagueofLegends'],
            ['jeu_id' => 10, 'url' => 'https://www.youtube.com/watch?v=76cG7bcmmqM&ab_channel=LeagueofLegends'],
            ['jeu_id' => 10, 'url' => 'https://www.youtube.com/watch?v=pNjWjwae-us&ab_channel=LeagueofLegends%3AWildRift'],
        ];

        DB::table('videos')->insert($videos);
    }
}
