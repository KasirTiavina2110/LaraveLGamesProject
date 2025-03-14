<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    public function run()
    {
        $images = [
            ['jeu_id' => 1, 'url' => 'https://library.sportingnews.com/styles/twitter_card_120x120/s3/2024-07/EA_FC25_Standard_KeyArt_16-9_3840x2160_Hypermotion.png?itok=_ZwywqKG'],
            ['jeu_id' => 1, 'url' => 'https://assets-prd.ignimgs.com/2024/07/17/fc25-6-1721220696241.jpg'],
            ['jeu_id' => 1, 'url' => 'https://image.api.playstation.com/vulcan/ap/rnd/202407/1814/ad53de47262b4bd4bf41f1f62f7feb40095b7716e26a3d1c.jpg'],
            ['jeu_id' => 2, 'url' => 'https://computercity.com/wp-content/uploads/helldivers-2-logo.webp'],
            ['jeu_id' => 2, 'url' => 'https://i.ytimg.com/vi/N6F_aVqXuwU/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLB06V2lE1d3Uem3WgzTbfZCyW6P3g'],
            ['jeu_id' => 2, 'url' => 'https://newsboilerstorage.blob.core.windows.net/news/2601328_0_lg.jpg'],
            ['jeu_id' => 3, 'url' => 'https://upload.wikimedia.org/wikipedia/en/b/b6/Ghost_of_Tsushima.jpg'],
            ['jeu_id' => 3, 'url' => 'https://i.pinimg.com/originals/37/bb/83/37bb83db16c56bb5a645ed899c9c70a0.jpg'],
            ['jeu_id' => 3, 'url' => 'https://gameranx.com/wp-content/uploads/2018/09/Ghost-of-Tsushima-4K-Wallpaper.jpg'],
            ['jeu_id' => 4, 'url' => 'https://assets.nintendo.com/image/upload/ar_16:9,b_auto:border,c_lpad/b_white/f_auto/q_auto/dpr_1.5/c_scale,w_400/ncom/software/switch/70010000072957/9f5e069de49fa3644732f1c7073dea13a059a86e433da60e042d4f0f35b165bb'],
            ['jeu_id' => 4, 'url' => 'https://static.wikia.nocookie.net/siivagunner/images/5/5d/Paper_Mario-_The_Thousand-Year_Door.jpg/revision/latest?cb=20170426081740'],
            ['jeu_id' => 4, 'url' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/89583cf7-eb5d-471b-9090-73b13095aa22/dd0alot-62d47c65-13ae-411f-b205-b3eebc49b521.png/v1/fill/w_1280,h_1351,q_80,strp/paper_mario__the_thousand_year_door_by_muzyoshi_dd0alot-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTM1MSIsInBhdGgiOiJcL2ZcLzg5NTgzY2Y3LWViNWQtNDcxYi05MDkwLTczYjEzMDk1YWEyMlwvZGQwYWxvdC02MmQ0N2M2NS0xM2FlLTQxMWYtYjIwNS1iM2VlYmM0OWI1MjEucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.yS2nZAnbMoCTN9XAmHOa8BWvzQTLP2-xhkPHhwiREVk'],
            ['jeu_id' => 5, 'url' => 'https://wallpapercave.com/wp/wp13468259.jpg'],
            ['jeu_id' => 5, 'url' => 'https://i.ytimg.com/vi/QkHoZuz6Gtw/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCpo_9J1sJXx8VhmzJvAKIZoEGW7Q'],
            ['jeu_id' => 5, 'url' => 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2024/09/dragon-s-dogma-2-screenshot.jpg'],
            ['jeu_id' => 6, 'url' => 'https://assets.nintendo.com/image/upload/q_auto/f_auto/ncom/software/switch/70010000057921/8a2cf8574961a349dc14f97c394d186ab1191b6e99682ddbe10fd4455c7197e1'],
            ['jeu_id' => 6, 'url' => 'https://staticctf.ubisoft.com/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/2vdIrNkwP2H2Ot8rlRDkxa/c12db3c47a6b7072bb50018551fc3d02/Combat-Forest-Warriors-_Autumnal-forest_1920x1080.jpg'],
            ['jeu_id' => 6, 'url' => 'https://www.agamingnetwork.com/content/images/size/w2000/2024/09/prince-of-persia-the-lost-crown-mask-of-darkness.webp'],
            ['jeu_id' => 7, 'url' => 'https://blz-contentstack-images.akamaized.net/v3/assets/blt3452e3b114fab0cd/bltfe141d746912b801/65383ad0ade0dcb1ef2ca2a9/Open_Graph_-_Ceviche.jpg'],
            ['jeu_id' => 7, 'url' => 'https://overgear.com/guides/wp-content/uploads/2024/07/world-of-warcraft-the-war-within-tier-sets-825x510.jpeg'],
            ['jeu_id' => 7, 'url' => 'https://wow.zamimg.com/uploads/screenshots/normal/1182981.jpg'],
            ['jeu_id' => 8, 'url' => 'https://admin.sportshackster.com/WallPaperMedia/PlayerWallPaperImage/fortnite-5_63856400215288.3.jpg'],
            ['jeu_id' => 8, 'url' => 'https://pbs.twimg.com/media/GO3EuM0a4AAd4DL?format=png&name=4096x4096'],
            ['jeu_id' => 8, 'url' => 'https://cdn.mos.cms.futurecdn.net/XrXVDRaNtXkjBEigZ3ZrNY.jpg'],
            ['jeu_id' => 9, 'url' => 'https://images8.alphacoders.com/137/1377263.jpg'],
            ['jeu_id' => 9, 'url' => 'https://i.ytimg.com/vi/Jl1Q2F_FPjo/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLA-_ccsK6hcHtwt5MJma4vPKoMzkw'],
            ['jeu_id' => 9, 'url' => 'https://i.ytimg.com/vi/o6mactKp69U/hq720.jpg?v=671f3d5e&sqp=CMCu_bgG-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDZf6ZF3rmzH8TUzNJbRjHAsmY7Pg'],
            ['jeu_id' => 10, 'url' => 'https://cmsassets.rgpub.io/sanity/images/dsfx7636/news_live/3705653167ef8f43acdc03fb2f0a469d5b3086fd-1920x1080.jpg'],
            ['jeu_id' => 10, 'url' => 'https://i.pinimg.com/originals/64/fd/9b/64fd9b859172e0ed330da354b854b4b8.jpg'],
            ['jeu_id' => 10, 'url' => 'https://i.ytimg.com/vi/oOYb7vZU_mU/maxresdefault.jpg'],
        ];

        DB::table('images')->insert($images);
    }
}
