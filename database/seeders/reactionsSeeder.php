<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $reactionName = ['Like','Dislike','Heart','Sad','Angry'];

        for ($ctr = 0; $ctr < 20; $ctr++) {
            DB::table('reactions')->insert([
                'post_ID' => rand(1,10),
                'user_ID' => rand(1,10),
                'reaction' => $reactionName[rand(0,4)]
            ]);
        }
    }
}
