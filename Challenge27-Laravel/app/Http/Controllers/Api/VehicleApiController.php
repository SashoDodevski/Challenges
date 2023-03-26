<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $vehicles = Vehicle::where('brand', 'like', "%{$search}%")
                ->orWhere('model', 'like', "%{$search}%")
                ->orWhere('plate_number', 'like', "%{$search}%")
                ->get();
        } else {
            $vehicles = Vehicle::get();
        }

        return response()->json($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle = new Vehicle();
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->insurance_date = date('Y-m-d');

        if($vehicle->save()) {
            return response()->json(['success' => 'Vehicle created!!']);
        }

        return response()->json(['error' => 'Something bad happened!!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, $vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);

        if($vehicle) {
            $vehicle->brand = $request->brand;
            $vehicle->model = $request->model;
            $vehicle->plate_number = $request->plate_number;
    
            if($vehicle->save()) {
                return response()->json(['success' => 'Vehicle updated!!', 'vehicle' => $vehicle]);
            };
            return response()->json(['error' => 'Something bad happened!!']);
        }

        return response()->json(['error' => 'Vehicle does not exist', 'vehicle' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);

        if($vehicle) {
            $vehicle->delete();
            return response()->json(['success' => 'Vehicle deleted!!']);
        }

        return response()->json(['error' => 'Vehicle does not exist']);
    }

}
