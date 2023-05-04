<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VolunteerPosition;
use Illuminate\Http\Request;

class VolunteerPositionsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteerPositions = VolunteerPosition::get();

        if($volunteerPositions) {
            return response()->json(['contact' => $volunteerPositions]);
        }

        return response()->json(['error' => 'Sorry, there are no volunteer positions in our registry!']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
