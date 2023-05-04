<?php

namespace Database\Seeders;

use App\Models\VolunteerPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerPosition::insert([
            [
                'volunteer_position' => 'Volunteer 1'
            ],
            [
                'volunteer_position' => 'Volunteer 2'
            ]
        ]);
    }
}
