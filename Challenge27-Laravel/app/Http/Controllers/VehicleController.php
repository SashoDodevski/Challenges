<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vehicle $vehicle)
    {
        return view('vehicles.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function vehicles(Request $request){

        if ($request->ajax()) {
            $data = Vehicle::query();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>';
                        $btn = $btn.'<a href="/vehicles/${id}/edit" class="edit btn btn-primary btn-sm">Edit</a>';
                        $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
         
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // $vehicles = Vehicle::query();

        // return DataTables::eloquent($vehicles)->toJson();
    }
}
