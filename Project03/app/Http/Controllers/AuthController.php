<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginFormRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(LoginFormRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'These credentials do not match our records.');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
