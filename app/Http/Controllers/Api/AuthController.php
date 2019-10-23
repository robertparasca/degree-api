<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        $token = $user->createToken('auth_token')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($validatedData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $user = auth()->user();

        $token = $user->createToken('auth_token')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $token
        ]);
    }
}
