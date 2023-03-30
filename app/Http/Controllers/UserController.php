<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        if(Session::has('Session1')){
        $userNEW = Session::get('Session1');
        return view('users.index', compact('userNEW'));
        } else {
            return view('users.index');
        }
    }

    public function create()
    {
        return view('users.create');
    }

 
    public function store(UserFormRequest $request)
    {
        $user = $request->all();
        Session::put('Session1', $user);
        $userNEW = Session::get('Session1');
        return view('users.show', compact('userNEW'));
    }

    public function logout()
    {
        session()->flush();
        return to_route('users.index');
    }
}
