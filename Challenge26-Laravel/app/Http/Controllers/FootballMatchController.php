<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\FootballMatch;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFootballMatchRequest;
use App\Http\Requests\UpdateFootballMatchRequest;

class FootballMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();

        $match_results = FootballMatch::where('goals_team_1', '!=', null)->orderBy('match_day', 'asc')->get();
        $match_fixtures = FootballMatch::where('goals_team_1', null)->orderBy('match_day', 'asc')->get();

        return view('football_matches.index', compact('teams', 'match_results', 'match_fixtures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::get();

        return view('football_matches.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFootballMatchRequest $request)
    {
        $footballMatch = new FootballMatch();
        $footballMatch->match_day = $request->match_day;
        $footballMatch->team_1_id = $request->team_1_id;
        $footballMatch->team_2_id = $request->team_2_id;
        $footballMatch->goals_team_1 = $request->goals_team_1;
        $footballMatch->goals_team_2 = $request->goals_team_2;

        if($footballMatch->save()) {
            return redirect()->route('football_matches.index')->with('success', 'Football match added successfully!');
        } else {
            return redirect()->route('football_matches.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FootballMatch $footballMatch)
    {

        $team_1 = Team::get()->where('team_1_id', $footballMatch->team_1_id);
        $team_2 = Team::get()->where('team_2_id', $footballMatch->team_2_id);
        return view('football_matches.show', compact('footballMatch', 'team_1', 'team_2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FootballMatch $footballMatch)
    {
        $teams = Team::get();
        return view('football_matches.edit', compact('footballMatch', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFootballMatchRequest $request, FootballMatch $footballMatch)
    {
        $footballMatch->match_day = $request->match_day;
        $footballMatch->team_1_id = $request->team_1_id;
        $footballMatch->team_2_id = $request->team_2_id;
        $footballMatch->goals_team_1 = $request->goals_team_1;
        $footballMatch->goals_team_2 = $request->goals_team_2;

        if($footballMatch->save()) {
            return redirect()->route('football_matches.index')->with('success', 'Football match updated successfully!');
        } else {
            return redirect()->route('football_matches.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FootballMatch $footballMatch)
    {
        if($footballMatch->delete()) {
            return redirect()->route('football_matches.index')->with('success', 'Football match deleted successfully!');
        } else {
        return redirect()->route('football_matches.index')->with('error', 'Something went wrong...');
        }
    }
}
