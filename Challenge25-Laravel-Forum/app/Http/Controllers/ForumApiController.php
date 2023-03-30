<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumApiController extends Controller
{
    public function index()
    {
        $forums = Forum::get();

        return response()->json($forums);
    }
}
