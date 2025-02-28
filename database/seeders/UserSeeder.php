<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'agif',
            'username' => 'agif',
            'email' => 'agif@test.com',
            'password' => '123456',
            'password_recovery' => '123456',
            'aktif' => false


        ]);

        User::create([
            'name' => 'asrul',
            'username' => 'asrul',
            'email' => 'asrul@test.com',
            'password' => '123456',
            'password_recovery' => '123456',
            'aktif' => false

        ]);

        User::create([
            'name' => 'beta',
            'username' => 'beta',
            'email' => 'beta@test.com',
            'password' => '123456',
            'password_recovery' => '123456',
            'aktif' => false
        ]);

        User::create([
            'name' => 'fadil',
            'username' => 'fadil',
            'email' => 'fadil@test.com',
            'password' => '123456',
            'password_recovery' => '123456',
            'aktif' => false

        ]);
        User::create([
            'name' => 'staf',
            'username' => 'staf',
            'email' => 'staf@test.com',
            'password' => '123456',
            'password_recovery' => '123456',
            'aktif' => false

        ]);
    }
}
