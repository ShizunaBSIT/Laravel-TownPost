<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*DB::table('admins')->insert([
            'user_ID' => rand(1,5),
            'date_start' => date('y-m-d')
        ]);*/

        for($ctr = 1; $ctr <= 5; $ctr++) {
            DB::table('admins')->insert([
                'user_ID' => $ctr,
                'date_start' => date('y-m-d')
            ]);
        }

    }
}
