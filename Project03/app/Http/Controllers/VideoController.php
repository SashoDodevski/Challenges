<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::get();

        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        $video = new Video();
        $video->name = $request->name;
        $video->video_url = $request->video_url;
        
        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $video->image = $filePath;
        
        if($video->save()) {
            return redirect()->route('videos.index')->with('success', 'Video added successfully!');
        } else {
            return redirect()->route('videos.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->name = $request->name;
        $video->video_url = $request->video_url;

        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $video->image = $filePath;

        if($video->save()) {
            return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
        } else {
            return redirect()->route('videos.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if($video->delete()) {
            return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
        } else {
        return redirect()->route('videos.index')->with('error', 'Something went wrong...');
        }
    }
}
