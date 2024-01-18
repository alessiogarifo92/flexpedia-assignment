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
        //seeders to test correct functionality of database and application
        \App\Models\User::factory(10)->create();
        \App\Models\BlogPost::factory(30)->create();

    }
}
