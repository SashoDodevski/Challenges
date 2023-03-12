<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;

class CommentController extends Controller
{
    public function create(Forum $forum)
    {
         return view('comments.create', compact('forum'));
    }

    public function store(CommentStoreRequest $request, Forum $forum)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->forum_id = $forum->id;
        $comment->user_id = Auth::id();

        if($comment->save()) {
            return redirect()->route('forums.show', $forum)->with('success', 'Comment created successfully!');
        }

        return redirect()->route('forums.show', $forum)->with('error', 'Something went wrong...');
    }

    public function edit(Forum $forum, Comment $comment)
    {
        return view('comments.edit', compact('forum', 'comment'));
    }

    public function update(CommentStoreRequest $request, Forum $forum, Comment $comment)
    {
        $comment->comment = $request->comment;

        if($comment->save()) {
            return redirect()->route('forums.show', $forum)->with('success', 'Comment updated successfully!');
        }

        return redirect()->route('forums.show', $forum)->with('error', 'Something went wrong...');
    }


    public function destroy(Comment $comment)
    {
          if($comment->delete()) {
            return back()->with('success', 'Comment deleted successfully!');
        }

        return back()->with('error', 'Something went wrong...');
    }
}
