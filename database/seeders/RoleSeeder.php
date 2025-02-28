<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ]);

        for ($i = 2; $i < 6; $i++) {
            DB::table('model_has_roles')->insert([
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => $i
            ]);
        }
    }
}
