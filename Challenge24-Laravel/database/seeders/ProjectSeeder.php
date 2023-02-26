<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

require_once 'vendor/autoload.php';

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $projects = [];
        for($i = 0; $i < 6; $i++) {
            array_push($projects, [
                'title' => fake()->words(3, true),
                'subtitle' => fake()->sentence(),
                'description' => fake()->sentences(3, true),
                'image' => fake()->imageUrl(),
                'url' => fake()->url(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('projects')->insert($projects);
    }
}
