<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home () {
        $projects = Project::get();
        return view('home', compact('projects'));
    }

    public function signIn () {

        return view('signIn');
    }
}
