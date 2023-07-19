<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PrimaryAddress;
use App\Models\SecondaryAddress;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1000)->create();

        $this->call([
           
            // RoleSeeder::class,
            // AdminSeeder::class,
            // PrimaryAddressSeeder::class,
            // SecondaryAddressSeeder::class,

        ]);
    }
}
