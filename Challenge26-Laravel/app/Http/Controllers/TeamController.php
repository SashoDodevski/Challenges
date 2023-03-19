<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\FootballMatch;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();

        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->foundation_year = $request->foundation_year;

        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $team->image = $filePath;

        // dd($team);

        if($team->save()) {
            return redirect()->route('teams.index')->with('success', 'Team created successfully!');
        } else {
            return redirect()->route('teams.index')->with('error', 'Something went wrong...');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $players = Player::get()->where('team_id', $team->id);
        $match_results = FootballMatch::where(function ($query){
            $query->whereNotNull('goals_team_1')
                  ->whereNotNull('goals_team_2');
        })->where(function ($query) use ($team){
            $query->where('team_1_id', $team->id)
                  ->orWhere('team_2_id', $team->id);
        })->orderBy('match_day', 'asc')->get();
        $match_fixtures = FootballMatch::where(function ($query){
            $query->whereNull('goals_team_1')
                  ->whereNull('goals_team_2');
        })->where(function ($query) use ($team){
            $query->where('team_1_id', $team->id)
                  ->orWhere('team_2_id', $team->id);
        })->orderBy('match_day', 'asc') ->get();

        return view('teams.show', compact('team', 'players', 'match_results', 'match_fixtures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->name = $request->name;
        $team->foundation_year = $request->foundation_year;

        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $team->image = $filePath;

        // dd($team);

        if($team->save()) {
            return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
        } else {
            return redirect()->route('teams.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        // dd($team);
        if($team->delete()) {
            return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
        } else {
        return redirect()->route('teams.index')->with('error', 'Something went wrong...');
        }
    }
}
