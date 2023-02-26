<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    public function store(StoreCompanyRequest $request): Request | RedirectResponse
    {
        $company = new Company();

        $company->company = $request->company;
        $company->email = $request->email;
        $company->phone = $request->phone;

        $company->save();

        return to_route('index')->with('success', 'We registered Your company! We will contact You very soon.');

    }
}
