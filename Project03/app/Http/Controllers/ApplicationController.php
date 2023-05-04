<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Equipment;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\EquipmentType;
use App\Models\HistoryStatus;
use App\Models\ArchivedClient;
use App\Models\ClientEquipment;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history_statuses = HistoryStatus::get();

        return view('applications.index', compact('history_statuses'));
    }

    public function archivedApplications()
    {
        $history_statuses = HistoryStatus::get();

        return view('applications.archived', compact('history_statuses'));
    }

    public function active()
    {
        $clients = Client::query()
            ->join('client_equipment', 'client_equipment.client_id', '=', 'clients.id')
            ->join('equipment', 'client_equipment.equipment_id', '=', 'equipment.id')
            ->join('documents', 'documents.client_id', '=', 'clients.id')
            ->join('comments', 'comments.client_id', '=', 'clients.id')
            ->join('applications', 'applications.client_id', '=', 'clients.id')
            ->where('history_status_id', 1)
            ->join('application_statuses', 'applications.application_status_id', '=', 'application_statuses.id');


        return DataTables::eloquent($clients)->toJson();
    }

    public function archived()
    {
        $clients = Client::query()
        ->join('client_equipment', 'client_equipment.client_id', '=', 'clients.id')
        ->join('equipment', 'client_equipment.equipment_id', '=', 'equipment.id')
        ->join('documents', 'documents.client_id', '=', 'clients.id')
        ->join('comments', 'comments.client_id', '=', 'clients.id')
        ->join('applications', 'applications.client_id', '=', 'clients.id')
        ->where('history_status_id', 2)
        ->join('application_statuses', 'applications.application_status_id', '=', 'application_statuses.id');

        return DataTables::eloquent($clients)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipment_types = Equipment::get();

        return view('applications.create', compact('equipment_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->city = $request->city;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        if (!$client->save()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }

        $clientId = Client::where('email', $request->email)->first()->id;

        $client_equipment = new ClientEquipment();
        $client_equipment->client_id = $clientId;
        $client_equipment->equipment_id = $request->equipment_type_id;
        if (!$client_equipment->save()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }

        $documents = new Document();
        $documents->client_id = $clientId;
        if (!$request->file('doc1')) {
            $client->doc1 = Null;
        } else {
            $doc1 = $request->file('doc1');
            $fileName1 = md5($doc1->getClientOriginalName() . time()) . '.' . $doc1->getClientOriginalExtension();
            $filePath1 = 'uploads/' . $fileName1;
            Storage::disk('public')->put($filePath1, file_get_contents($request->file('doc1')));
            $documents->doc1 = $filePath1;
        }

        if (!$request->file('doc2')) {
            $client->doc2 = Null;
        } else {
            $doc2 = $request->file('doc2');
            $fileName2 = md5($doc2->getClientOriginalName() . time()) . '.' . $doc2->getClientOriginalExtension();
            $filePath2 = 'uploads/' . $fileName2;
            Storage::disk('public')->put($filePath2, file_get_contents($request->file('doc2')));
            $documents->doc2 = $filePath2;
        }
        if (!$documents->save()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }

        $comment = new Comment();
        $comment->client_id = $clientId;
        $comment->comment = $request->comment;
        if (!$comment->save()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }

        $application = new Application();
        $application->client_id = $clientId;
        $application->application_status_id = ApplicationStatus::where('application_status', 'new')->first()->id;
        $application->history_status_id = HistoryStatus::where('history_status', 'active')->first()->id;
        $application->entry_date = today();
        if ($application->save()) {
            return redirect()->route('applications.index')->with('success', 'Application added successfully!');
        } else {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {        
        $client = Client::where('id', $id)->first();

        return view('applications.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        $equipment = Equipment::get();
        $application_statuses = ApplicationStatus::get();
        $history_statuses = HistoryStatus::get();

        return view('applications.edit', compact('client', 'equipment', 'application_statuses', 'history_statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, $client_id)
    {
        $client = Client::find($client_id);
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->city = $request->city;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        if (!$client->update()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        } else {
            $client->update();
        }

        $client_equipment = ClientEquipment::where('client_id', $request->client_id);

        if (!$client_equipment->update(['client_id' => $request->client_id, 'equipment_id' => $request->equipment_type_id])) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        } else {
            $client_equipment->update(['client_id' => $request->client_id, 'equipment_id' => $request->equipment_type_id]);
        }

        $documents = Document::where('client_id', $request->client_id)->first();
        $documents->client_id = $request->client_id;
        if (!isset($request->doc1)) {
            $documents->doc1 = Null;
        } else {
            $doc1 = $request->file('doc1');
            $fileName1 = md5($doc1->getClientOriginalName() . time()) . '.' . $doc1->getClientOriginalExtension();
            $filePath1 = 'uploads/' . $fileName1;
            Storage::disk('public')->put($filePath1, file_get_contents($request->file('doc1')));
            $documents->doc1 = $filePath1;
        }

        if (!isset($request->doc2)) {
            $documents->doc2 = Null;
        } else {
            $doc2 = $request->file('doc2');
            $fileName2 = md5($doc2->getClientOriginalName() . time()) . '.' . $doc2->getClientOriginalExtension();
            $filePath2 = 'uploads/' . $fileName2;
            Storage::disk('public')->put($filePath2, file_get_contents($request->file('doc2')));
            $documents->doc2 = $filePath2;
        }

        if (!$documents->update()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        } else {
            $documents->update();
        }

        
        $comment = Comment::where('client_id', $request->client_id)->first();
        $comment->client_id = $request->client_id;
        $comment->comment = $request->comment;
        if (!$comment->update()) {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        } else {
            $comment->update();
        }

        $application = Application::where('client_id', $request->client_id)->first();
        $application->client_id = $request->client_id;
        $application->application_status_id = $request->application_status_id;
        $application->history_status_id = $request->history_status_id;
        $application->entry_date = today();

        if($application->history_status_id == 2) {
            $application->archived_at = today();
        } else {
            $application->archived_at = Null;
        }
        if ($application->update()) {
            return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
        } else {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($client_id)
    {
        $client = Client::where('clients.id', $client_id)->first();
        if ($client->delete()) {
            return redirect()->route('applications.index')->with('success', 'Client deleted successfully!');
        } else {
            return redirect()->route('applications.index')->with('error', 'Something went wrong...');
        }
    }

    public function makeDonation(string $id)
    {
        $client = Client::where('id', $id)->first();
        return view('donations.create', compact('client'));
    }
}
