<?php

namespace Database\Seeders;

use App\Models\Kantor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kantor::create([
            'name' => 'Toko Baduo',
            'latitude' => -0.5074941880203557,
            'longitude' => 100.13539851191821,
            'radius' => 100
        ]);
        Kantor::create([
            'name' => 'Kantor Nagari Sikucur',
            'latitude' => -0.5074941880203557,
            'longitude' => 100.13539851191821,
            'radius' => 100
        ]);
        Kantor::create([
            'name' => 'Kantor Nagari Cimpago',
            'latitude' => -0.5411557854004777,
            'longitude' => 100.12013342288516,
            'radius' => 100
        ]);
        Kantor::create([
            'name' => 'Test Kantor',
            'latitude' => -0.918320512141763,
            'longitude' => 100.37662564273374,
            'radius' => 500
        ]);
    }
}
