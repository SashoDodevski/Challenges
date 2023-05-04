<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patners = Partner::join('partner_types', 'partner_types.id', 'partners.partner_type_id')
        ->select('partners.partner_type_id', 'partner_types.partner_type', 'partners.name', 'partners.image', 'partners.partner_url', 'partners.created_at')
        ->get();

        if($patners) {
            return response()->json(['contact' => $patners]);
        }

        return response()->json(['error' => 'Page is under constuction! :) ']);
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
