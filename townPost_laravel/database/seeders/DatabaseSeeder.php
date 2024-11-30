<?php

namespace Database\Seeders;

use App\Models\reaction_img;
use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserDummyData::class,
            CategoriesData::class,
            PostDummyData::class,
            adminSeeder::class,
            commentsSeeder::class,
            reactionImgSeeder::class,
            reactionsSeeder::class,
            adminPermSeeder::class
        ]);


    }
}
