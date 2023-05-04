<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VolunteerPosition;
use Database\Seeders\ApplicationStatusSeeder;

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

        $this->call([
            // AdminSeeder::class
            // PartnerTypeSeeder::class
            // EquipmentSeeder::class,
            // ApplicationStatusSeeder::class,
            // HistoryStatusSeeder::class,            
            // RoleSeeder::class,
            VolunteerPositionSeeder::class,
        ]);
    }
}
