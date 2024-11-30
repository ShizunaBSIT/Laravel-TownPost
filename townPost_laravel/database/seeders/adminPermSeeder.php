<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminPermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = ['delete','ban'];

        for ($ctr = 1; $ctr <= 5; $ctr++) {
            DB::table('admin_permissions')->insert([
                'admin_ID' => rand(1,5),
                'permission_name' => 'delete'
            ]);
        }

    }
}
