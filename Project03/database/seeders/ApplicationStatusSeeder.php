<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_statuses')->insert([
            [
                'application_status' => 'new'
            ],
            [
                'application_status' => 'invalid'
            ],
            [
                'application_status' => 'completed'
            ]
        ]);
    }
}
