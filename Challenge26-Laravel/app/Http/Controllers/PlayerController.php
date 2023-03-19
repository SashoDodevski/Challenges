<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\PlayersPosition;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::get();
        $teams = Team::get();

        // dd($players);

        return view('players.index', compact('players', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::orderBy('name', 'asc')->get();
        $positions = PlayersPosition::get();
        return view('players.create', compact('teams', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        $player = new Player();
        $player->team_id = $request->team_id;
        $player->position_id = $request->position_id;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->birth_date = $request->birth_date;
        
        if($player->save()) {
            return redirect()->route('players.index')->with('success', 'Player added successfully!');
        } else {
            return redirect()->route('players.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        $team = Team::get()->where('team_id', $player->team_id);
        // dd($comments);
        return view('players.show', compact('player', 'team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $teams = Team::orderBy('name', 'asc')->get();
        $positions = PlayersPosition::get();

        // dd($player);
        return view('players.edit', compact('player', 'teams', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->team_id = $request->team_id;
        $player->position_id = $request->position_id;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->birth_date = $request->birth_date;
        if($player->save()) {
            return redirect()->route('players.index')->with('success', 'Player updated successfully!');
        } else {
            return redirect()->route('players.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        if($player->delete()) {
            return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
        } else {
        return redirect()->route('players.index')->with('error', 'Something went wrong...');
        }
    }
}
