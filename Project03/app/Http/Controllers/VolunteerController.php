<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVolunteerRequest;
use App\Http\Requests\UpdateVolunteerRequest;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = Volunteer::where('volunteer_status', 'Request')
        ->get();
        
        return view('volunteers.index', compact('volunteers'));
    }

    public function activeVolunteers(Request $request)
    {
        $volunteers = Volunteer::where('volunteer_status', 'Active')
        ->get();

        return view('volunteers.activeVolunteers', compact('volunteers'));
    }

    
    public function requests()
    {
        $volunteers = Volunteer::query()->where('volunteer_status', 'Request')
        ->join('volunteer_positions', 'volunteer_positions.id', '=', 'volunteers.volunteer_position_id')
        ->select('volunteers.id', 'volunteers.name', 'volunteers.city', 'volunteers.email', 'volunteers.phone_number', 'volunteers.details', 'volunteers.doc1', 'volunteer_positions.volunteer_position');

        return DataTables::eloquent($volunteers)->toJson();
    }

    public function volunteers()
    {
        $volunteers = Volunteer::query()->where('volunteer_status', 'Active')
        ->join('volunteer_positions', 'volunteer_positions.id', '=', 'volunteers.volunteer_position_id')
        ->select('volunteers.id', 'volunteers.name', 'volunteers.city', 'volunteers.email', 'volunteers.phone_number', 'volunteers.details', 'volunteers.doc1', 'volunteer_positions.volunteer_position' );

        return DataTables::eloquent($volunteers)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $volunteer = Volunteer::where('id', $request->volunteer_id) 
        ->first();

        $volunteer->volunteer_status = "Active";
        if($volunteer->save()) {
            return redirect()->route('volunteers.index')->with('success', 'Volunteer approved successfully!');
        } else {
            return redirect()->route('volunteers.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $volunteer = Volunteer::where('id', $id) 
        ->first();

        // dd($volunteer->volunteerPosition->volunteer_position);

        return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $volunteer = Volunteer::where('id', $request->id)->first();
        $volunteer->volunteer_status = $request->volunteer_status;

        $volunteer->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        if ($volunteer->delete()) {
            return redirect()->route('volunteers.index')->with('success', 'Volunteer deleted successfully!');
        } else {
            return redirect()->route('volunteers.index')->with('error', 'Something went wrong...');
        }

    }
}
