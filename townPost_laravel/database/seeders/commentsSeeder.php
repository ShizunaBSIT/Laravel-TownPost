<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class commentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($ctr = 0; $ctr <= 20 ; $ctr++) {
            DB::table('comments')->insert([
           'post_ID' => rand(1,10),
           'user_ID' => rand(1,10),
           'content' => Str::random(20)
            ]);
        }
    }
}
