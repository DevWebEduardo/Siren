<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Pro_TypesSeeder::class);
        $this->call(Pri_TypesSeeder::class);
        $this->call(Ad_TypesSeeder::class);
        $this->call(LocationsSeeder::class);
    }
}
