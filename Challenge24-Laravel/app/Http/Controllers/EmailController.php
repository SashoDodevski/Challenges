<?php

namespace App\Http\Controllers;

use App\Mail\firstEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CompanyEmailRequest;

class EmailController extends Controller
{
    public function firstEmail (CompanyEmailRequest $request): Request | RedirectResponse
    {
        Mail::to($request->email)->send(new firstEmail);

        $company = $request->company;
        
        return to_route('index')->with('success', 'We registered Your company! Check Your inbox for new email.');
    }
}
