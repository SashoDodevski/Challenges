<?php

namespace Database\Seeders;


use App\Models\PlayersPosition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ['Goalkeeper', 'Defender', 'Midfielder', 'Striker'];

        foreach ($positions as $position) {
            $newPosition = new PlayersPosition();
            $newPosition->position = $position;
            $newPosition->save();
        }
    }
}
