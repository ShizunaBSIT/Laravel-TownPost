<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reactionImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $reactionName = ['Like','Dislike','Heart','Sad','Angry'];
        $reactionImg = ['like.png','dislike.png','heart.png','sad.png','angry.png'];

        for ($ctr = 0; $ctr < 5; $ctr++) {
            DB::table('reaction_imgs')->insert([
                'reaction' => $reactionName[$ctr],
                'image_src' => $reactionImg[$ctr]
            ]);
        }

    }
}
