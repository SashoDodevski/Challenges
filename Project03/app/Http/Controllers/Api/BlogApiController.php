<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::join('blog_categories', 'blog_categories.id', 'blogs.category_id')
                        ->select('blogs.category_id', 'blog_categories.category', 'blogs.title', 'blogs.text', 'blogs.image', )
                        ->get();

        if($blogs) {
            return response()->json(['contact' => $blogs]);
        }

        return response()->json(['error' => 'Sorry, there are no blogs in our registry!']);
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

        
        if ($blog->save()) {
            return response()->json(['success' => 'Blog added successfully!!!']);
        } else {
            return response()->json(['error' => 'Something went wrong...']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);

        if($blog) {
            return response()->json(['contact' => $blog]);
        }

        return response()->json(['error' => 'Sorry, no such blog in our registry!']);
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
