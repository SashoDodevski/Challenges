<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use App\Models\VolunteerPosition;

class VolunteerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVolunteerRequest $request)
    {
        $volunteer = new Volunteer();
        $volunteer->volunteer_status = "Request";
        $volunteer->name = $request->name;
        $volunteer->city = $request->city;
        $volunteer->email = $request->email;
        $volunteer->phone_number = $request->phone_number;
        $volunteer->volunteer_position_id = $request->volunteer_position_id;
        $volunteer->details = $request->details;
        $volunteer->doc1 = $request->doc1;
        if ($volunteer->save()) {
            return response()->json(['success' => 'Your volunteering application was sent to our administrators!!']);
        } else {
            return response()->json(['error' => 'Something went wrong...']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $volunteer = Volunteer::find($id);

        if($volunteer) {
            return response()->json(['contact' => $volunteer]);
        }

        return response()->json(['error' => 'Sorry, no such volunteer!']);
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
