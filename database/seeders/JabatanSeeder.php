<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'name' => 'SuperAdmin',
            'slug' => 'SuperAdmin',
        ]);
        Jabatan::create([
            'name' => 'WaliNagari',
            'slug' => 'WaliNagari',
        ]);
        Jabatan::create([
            'name' => 'Seketaris',
            'slug' => 'Seketaris',
        ]);
        Jabatan::create([
            'name' => 'Bendahara',
            'slug' => 'Bendahara',
        ]);
        Jabatan::create([
            'name' => 'Staf',
            'slug' => 'Staf',
        ]);
        Jabatan::create([
            'name' => 'Buruh Harian Lepas',
            'slug' => 'HPL',
        ]);
    }
}
