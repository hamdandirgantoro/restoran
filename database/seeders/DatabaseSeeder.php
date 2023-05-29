<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\makanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        makanan::create([
            'nama' => 'pecel',
            'harga' => 6000
        ]);
        makanan::create([
            'nama' => 'soto',
            'harga' => 7000
        ]);
        makanan::create([
            'nama' => 'rujak',
            'harga' => 5000
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'passwd'
        ]);
    }
}
