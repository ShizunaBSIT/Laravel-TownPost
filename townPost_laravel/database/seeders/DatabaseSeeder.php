<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

       /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
        
        // create 10 users
        for ($ctr = 0; $ctr <= 10; $ctr++) {
            
            DB::table('users')->insert([
                'username' => Str::random(10).$ctr,
                'email' => Str::random(10).$ctr.'@example.com',
                'password' => Hash::make('password'),
                'date_created' => date()
            ]);
        }
        

        for ( $ctr = 0; $ctr <= 10; $ctr++) {

             DB::table('users')->insert([
            'username' => Str::random(10).$ctr,
            'email' => Str::random(10).$ctr.'@example.com',
            'password' => Hash::make('password'),
            'date_created' => now()
        ]);

        }
        
    }
}