<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::create([
            'name' => 'pagi',
            'start_time' => now()->setTime(8, 0, 0)->format('H:i:s'),
            'end_time' => now()->setTime(17, 0, 0)->format('H:i:s')
        ]);
        Shift::create([
            'name' => 'siang',
            'start_time' => now()->setTime(11, 0, 0)->format('H:i:s'),
            'end_time' => now()->setTime(21, 0, 0)->format('H:i:s')
        ]);
        Shift::create([
            'name' => 'malam',
            'start_time' => now()->setTime(20, 0, 0)->format('H:i:s'),
            'end_time' => now()->setTime(8, 0, 0)->format('H:i:s')
        ]);
    }
}
