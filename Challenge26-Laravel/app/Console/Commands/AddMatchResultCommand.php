<?php

namespace App\Console\Commands;

use App\Models\FootballMatch;
use Illuminate\Console\Command;

class AddMatchResultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:match-result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds result of matches played';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {


        $footballMatches = FootballMatch::where('match_day', '<=', date('Y-m-d H:i:s', strtotime('-1 days')))
        ->where('goals_team_1', null)->get();

        foreach($footballMatches as $footballMatch) {
        $footballMatch->goals_team_1 = rand(0,5);
        $footballMatch->goals_team_2 = rand(0,5);
        $footballMatch->save();
        }

        
    }
}
