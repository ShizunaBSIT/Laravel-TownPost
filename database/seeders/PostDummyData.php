<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostDummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create dummy post data 
        for ($ctr = 0; $ctr <= 10 ; $ctr++) {

            DB::table('posts')->insert([
           'user_ID' => rand(1,10),
           'category_ID' => rand(1,5),
           'title' => Str::random(10),
           'content' => Str::random(25),
           'date_posted' => date('2024-11-29')
            ]);
        }
    }
}
