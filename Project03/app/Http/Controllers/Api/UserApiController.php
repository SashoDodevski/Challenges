<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserApiRequest;
use App\Http\Requests\LoginApiRequest;

class UserApiController extends Controller
{
    public function register(UserApiRequest $request)
    {
        $user = new User();
        $user->role_id = Role::where('role', 'user')->first()->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->remember_token = Hash::make($request->password);

        if($user->save()) {
            return response()->json(['success' => 'User created! You can now log in']);
        }

        return response()->json(['error' => 'Something went wrong...']);
    }

    public function login(LoginApiRequest $request)
    {
        dd($request);
        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            $response_data = [
                'success' => 'You are now logged in!',
                'token' => $user->createToken('api_key')->plainTextToken,
            ];

            return response()->json($response_data);
        }

        return response()->json(['error' => 'Something went wrong...']);
    }
}
