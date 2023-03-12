<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Forum;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ForumStoreRequest;
use App\Http\Requests\ForumUpdateRequest;
use App\Models\Comment;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::get();

        return view('index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('forums.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForumStoreRequest $request)
    {
        $forum = new Forum();
        $forum->title = $request->title;
        $forum->category_id = $request->category_id;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();
        $forum->is_active = 0;

        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;

        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $forum->image = $filePath;

        // dd($forum);

        if($forum->save()) {
            return redirect()->route('index')->with('success', 'Discussion created successfully! It needs to be approved before being posted.');
        }

        return redirect()->route('index')->with('error', 'Something went wrong...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        $comments = Comment::get()->where('forum_id', $forum->id);
        // dd($comments);
        return view('forums.show', compact('forum', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        $categories = Category::all();

        return view('forums.edit', compact('forum', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ForumUpdateRequest $request, Forum $forum)
    {
        $forum->title = $request->title;
        $forum->category_id = $request->category_id;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();

        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;

        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $forum->image = $filePath;

        if($forum->save()) {
            return redirect()->route('index')->with('success', 'Discussion updated successfully!');
        }

        return redirect()->route('index')->with('error', 'Something went wrong...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
          if($forum->delete()) {
            return redirect()->route('index')->with('success', 'Discussion deleted successfully!');
        }

        return redirect()->route('index')->with('error', 'Something went wrong...');
    }

    public function pending()
    {
        $forums = Forum::get();

        return view('forums.pending', compact('forums'));
    }

    public function approveForum(Forum $forum)
    {
        
        $forum->is_active = true;

        if($forum->save()) {
            return redirect()->route('forums.pending')->with('success', 'Discussion approved successfully!');
        }

        return redirect()->route('forums.pending')->with('error', 'Something went wrong...');
    }
}
