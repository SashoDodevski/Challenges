<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::get();

        return view('blogCategories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        $blogCategory = new BlogCategory();
        $blogCategory->category = $request->blogCategory;
                
        if($blogCategory->save()) {
            return redirect()->route('blogCategories.index')->with('success', 'Category added successfully!');
        } else {
            return redirect()->route('blogCategories.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        return view('blogCategories.show', compact('blogCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('blogCategories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->category = $request->blogCategory;
                
        if($blogCategory->save()) {
            return redirect()->route('blogCategories.index')->with('success', 'Category updated successfully!');
        } else {
            return redirect()->route('blogCategories.index')->with('error', 'Something went wrong...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if($blogCategory->delete()) {
            return redirect()->route('blogCategories.index')->with('success', 'Category deleted successfully!');
        } else {
        return redirect()->route('blogCategories.index')->with('error', 'Something went wrong...');
        }
    }
}
