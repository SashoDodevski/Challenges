<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Donation;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ClientDonation;
use App\Models\ClientEquipment;
use App\Models\DonationEquipment;
use App\Models\ApplicationDonation;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('donations.index');
    }

    public function allDonations()
    {
        $donations = Donation::query()
        ->join('application_donations', 'application_donations.donation_id', '=', 'donations.id')
        ->join('client_donations', 'client_donations.donation_id', '=', 'donations.id')
        ->join('clients', 'clients.id', '=', 'client_donations.client_id')
        ->join('donation_equipment', 'donation_equipment.donation_id', '=', 'donations.id')
        ->join('equipment', 'equipment.id', '=', 'donation_equipment.equipment_id')
        ->select('donations.id AS donation_id', 'clients.first_name', 'clients.last_name', 'clients.city', 'clients.email', 'clients.phone_number', 'donations.id', 'donations.donation', 'donations.created_at AS donations_created_at');
        
        return DataTables::eloquent($donations)->toJson();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {
        $donation = new Donation();
        $donation->donation = $request->donation;
        if (!$donation->save()) {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        } else {
            $donation->save();
        }
        
        $donationId = $donation->id;

        $application = Application::where('client_id', $request->client_id)->first();
        $applicationId = $application->id;

        $applicationDonation = new ApplicationDonation();
        $applicationDonation->application_id = $applicationId;
        $applicationDonation->donation_id = $donationId;
        if (!$applicationDonation->save()) {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        } else {
            $applicationDonation->save();
        }

        $application->application_status_id = 3;
        $application->save();
        
        $clientDonation = new ClientDonation();
        $clientDonation->client_id = $request->client_id;
        $clientDonation->donation_id = $donationId;
        if (!$clientDonation->save()) {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        } else {
            $clientDonation->save();
        }

        $clientEquipment = ClientEquipment::where('client_id', $request->client_id)->first();
        $equipmentId =  $clientEquipment->equipment_id;

        $donationEquipment = new DonationEquipment();
        $donationEquipment->donation_id = $donationId;
        $donationEquipment->equipment_id = $equipmentId;
        if ($donationEquipment->save()) {
            return redirect()->route('donations.index')->with('success', 'Donation added successfully!');
        } else {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $donation = Donation::where('id', $id)->first();

        return view('donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $donation = Donation::where('id', $id)->first();

        return view('donations.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {

        $donation = Donation::where('id', $donation->id)->first();
        $donation->donation = $request->donation;

        if ($donation->save()) {
            return redirect()->route('donations.index')->with('success', 'Donation updated successfully!');
        } else {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        if ($donation->delete()) {
            return redirect()->route('donations.index')->with('success', 'Donation deleted successfully!');
        } else {
            return redirect()->route('donations.index')->with('error', 'Something went wrong...');
        }
    }

}
