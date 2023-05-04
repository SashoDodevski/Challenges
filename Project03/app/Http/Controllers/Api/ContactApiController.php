<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;

class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        $contact->message_status = "New";

        if($contact->save()) {
            return response()->json(['success' => 'Your message was sent to our administrators!!']);
        }

        return response()->json(['error' => 'Something went wrong...']);
    }

    /**
     * Display the specified resource.
     */
    public function show($contact_id)
    {
        $contact = Contact::find($contact_id);

        if($contact) {
            return response()->json(['contact' => $contact]);
        }

        return response()->json(['error' => 'Sorry, no such message was saved']);
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
