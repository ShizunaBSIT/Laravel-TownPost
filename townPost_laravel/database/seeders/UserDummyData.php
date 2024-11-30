<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // create dummy user data 
        for ($ctr = 0; $ctr <= 10 ; $ctr++) {

            DB::table('users')->insert([
           'username' => Str::random(10).$ctr,
           'email' => Str::random(10).$ctr.'@example.com',
           'password' => Hash::make('password'),
           'date_created' => date('2024-11-29')
            ]);
        }

    }
}
