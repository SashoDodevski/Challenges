<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        $user = Auth::user();
        return view('index', compact(['projects', 'user']));
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
    public function store(StoreProjectRequest $request): Request | RedirectResponse 
    {
        $project = new Project();

        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->image = $request->image;
        $project->url = $request->url;
        $project->description = $request->description;

        $project->save();

        return to_route('dashboard')->with('success', 'Project successfully created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): Request | RedirectResponse
    {
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->image = $request->image;
        $project->url = $request->url;
        $project->description = $request->description;

        $project->save();

        return to_route('dashboard')->with('success', 'Project successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): Request | RedirectResponse
    {
        $project->delete();

        return to_route('dashboard')->with('success', 'Project successfully deleted!');

    }
}
