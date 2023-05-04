<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;

class VideoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::get();

        if($videos) {
            return response()->json(['contact' => $videos]);
        }

        return response()->json(['error' => 'Sorry, there are no videos in our registry!']);
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

        if ($video->save()) {
            return response()->json(['success' => 'Video added successfully!!!']);
        } else {
            return response()->json(['error' => 'Something went wrong...']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = Video::find($id);

        if($video) {
            return response()->json(['contact' => $video]);
        }

        return response()->json(['error' => 'Sorry, no such video in our registry!']);
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
