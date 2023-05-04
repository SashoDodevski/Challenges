<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = Contact::where('message_status', 'New')->get();

        return view('contacts.index', compact('contacts'));
    }

    public function archivedContacts(Request $request)
    {
        $contacts = Contact::where('message_status', 'Read')->get();

        return view('contacts.archivedContacts', compact('contacts'));
    }

    
    public function active()
    {
        $contacts = Contact::query()->where('message_status', 'New');

        return DataTables::eloquent($contacts)->toJson();
    }

    public function archived()
    {
        $contacts = Contact::query()->where('message_status', 'Read');

        return DataTables::eloquent($contacts)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $contact = Contact::where('contacts.id', $id)->first();

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::where('id', $request->id)->first();
        $contact->message_status = $request->message_status;

        $contact->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if($contact->delete()) {
            return redirect()->route('contacts.index')->with('success', 'Message deleted successfully!');
        } else {
        return redirect()->route('videos.index')->with('error', 'Something went wrong...');
        }
    }
}
