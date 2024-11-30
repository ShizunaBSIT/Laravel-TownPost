<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert categories
        
        // job row
        DB::table('categories')->insert([
            'name' => 'Job',
            'image_src' => 'jobImage.png'
             ]);

        //school
        DB::table('categories')->insert([
            'name' => 'School',
            'image_src' => 'School.png'
             ]);

        //community(disaster risk and upcoming community activities)
        DB::table('categories')->insert([
            'name' => 'Community',
            'image_src' => 'Community.png'
             ]);
        
        //entertainment('sports, literary)
        DB::table('categories')->insert([
            'name' => 'Entertainment',
            'image_src' => 'Entertainment.png'
             ]);
        
        //news(weather updates and the situation of the community after a typhoon)
        DB::table('categories')->insert([
            'name' => 'News',
            'image_src' => 'News.png'
             ]);
    }
}
