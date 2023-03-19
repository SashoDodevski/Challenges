<?php

namespace App\Models;

use App\Models\Player;
use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    public function football_matches()
    {
        return $this->hasMany(FootballMatch::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
