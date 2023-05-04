<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\PartnerType;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::get();

        $partnerTypes = PartnerType::get();

        return view('partners.index', compact('partners'), compact('partnerTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partnerTypes = PartnerType::get();

        return view('partners.create', compact('partnerTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->partner_url = $request->partner_url;
        $partner->partner_type_id = $request->partner_type_id;
        
        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $partner->image = $filePath;
        
        if($partner->save()) {
            return redirect()->route('partners.index')->with('success', 'Partner added successfully!');
        } else {
            return redirect()->route('partners.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        $partnerType = PartnerType::where('id', $partner->partner_type_id)->get();
        $partnerType = $partnerType[0]->partner_type;

        return view('partners.show', compact('partner'), compact('partnerType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $partnerTypes = PartnerType::get();

        return view('partners.edit', compact('partner'), compact('partnerTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->name = $request->name;
        $partner->partner_url = $request->partner_url;
        $partner->partner_type_id = $request->partner_type_id;
        
        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $partner->image = $filePath;
        
        if($partner->save()) {
            return redirect()->route('partners.index')->with('success', 'Partner updated successfully!');
        } else {
            return redirect()->route('partners.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if($partner->delete()) {
            return redirect()->route('partners.index')->with('success', 'Partner deleted successfully!');
        } else {
        return redirect()->route('partners.index')->with('error', 'Something went wrong...');
        }
    }
}
