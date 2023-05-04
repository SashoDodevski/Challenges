<?php

namespace Database\Seeders;

use App\Models\PartnerType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartnerType::insert([
            [
                'partner_type' => 'regional'
            ],
            [
                'partner_type' => 'international'
            ],
            [
                'partner_type' => 'official'
            ]
        ]);
    }
}
