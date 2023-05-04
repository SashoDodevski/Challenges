<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\HistoryStatus;
use App\Models\ClientEquipment;
use App\Models\ApplicationStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreApplicationRequest;

class ApplicationApiController extends Controller
{
    public function index()
    {

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
            return response()->json(['error' => 'Something went wrong...']);
        } else {
            $client->save();
        }

        $clientId = Client::where('email', $request->email)->first()->id;

        $client_equipment = new ClientEquipment();
        $client_equipment->client_id = $clientId;
        $client_equipment->equipment_id = $request->equipment_type_id;
        if (!$client_equipment->save()) {
            return response()->json(['error' => 'Something went wrong...']);
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
            return response()->json(['error' => 'Something went wrong...']);
        }

        $comment = new Comment();
        $comment->client_id = $clientId;
        $comment->comment = $request->comment;
        if (!$comment->save()) {
            return response()->json(['error' => 'Something went wrong...']);
        }

        $application = new Application();
        $application->client_id = $clientId;
        $application->application_status_id = ApplicationStatus::where('application_status', 'нова')->first()->id;
        $application->history_status_id = HistoryStatus::where('history_status', 'активна')->first()->id;
        $application->entry_date = today();
        if ($application->save()) {
            return response()->json(['success' => 'Your application was sent to our administrators!!']);
        } else {
            return response()->json(['error' => 'Something went wrong...']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::where('clients.id', $id)
        ->join('client_equipment', 'client_equipment.client_id', '=', 'clients.id')
        ->join('equipment', 'client_equipment.equipment_id', '=', 'equipment.id')
        ->join('documents', 'documents.client_id', '=', 'clients.id')
        ->join('comments', 'comments.client_id', '=', 'clients.id')
        ->join('applications', 'applications.client_id', '=', 'clients.id')
        ->join('application_statuses', 'applications.application_status_id', '=', 'application_statuses.id')
        ->join('history_statuses', 'applications.history_status_id', '=', 'history_statuses.id')->first();

        if($client) {
            return response()->json(['contact' => $client]);
        }

        return response()->json(['error' => 'Sorry, no such application was saved']);
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
