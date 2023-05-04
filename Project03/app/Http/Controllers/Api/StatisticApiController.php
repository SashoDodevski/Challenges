<?php

namespace App\Http\Controllers\Api;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class StatisticApiController extends Controller
{
    public function index()
    {
        $partners = Partner::get()->count();
        $donations = Donation::get()->count();

        
        if($partners && $donations) {
            return response()->json(['partners' => $partners, 'donations' => $donations]);
        }

        return response()->json(['error' => 'Page is under constuction! :) ']);
    }
}
