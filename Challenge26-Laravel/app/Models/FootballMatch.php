<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootballMatch extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function teamName($team_id)
    {
        $team = Team::where('id', $team_id)->get();
        return $team[0]->name;
    }

    public function teamObject($team_id)
    {
        $team = Team::where('id', $team_id)->first();
        return $team;
    }

}
