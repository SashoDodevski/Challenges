<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::get();
        return view('blogs.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->category_id = $request->category_id;
               
        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $blog->image = $filePath;

        
        if($blog->save()) {
            return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
        } else {
            return redirect()->route('blogs.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::get();

        return view('blogs.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
               
        $image = $request->file('image');
        $fileName = md5($image->getClientOriginalName().time()) . '.' . $image->getClientOriginalExtension();
        $filePath = 'uploads/'.$fileName;
        Storage::disk('public')->put($filePath, file_get_contents($request->file('image')));
        $blog->image = $filePath;

        $blog->category_id = $request->category_id;
        
        if($blog->save()) {
            return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
        } else {
            return redirect()->route('blogs.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->delete()) {
            return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
        } else {
        return redirect()->route('blogs.index')->with('error', 'Something went wrong...');
        }
    }
}
