<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'user_id' => 1,
            'shift_id' => 1,
            'kantor_id' => 1
        ]);
        Schedule::create([
            'user_id' => 2,
            'shift_id' => 1,
            'kantor_id' => 4
        ]);
        Schedule::create([
            'user_id' => 3,
            'shift_id' => 1,
            'kantor_id' => 1
        ]);
        Schedule::create([
            'user_id' => 4,
            'shift_id' => 1,
            'kantor_id' => 1
        ]);
        Schedule::create([
            'user_id' => 5,
            'shift_id' => 2,
            'kantor_id' => 4
        ]);
    }
}
