<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function createToken($user) {
        $token = $user->createToken('auth_token')->accessToken;

        return [
            'user' => $user,
            'access_token' => $token
        ];
    }

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
            return $this->response422(['message' => 'Invalid credentials']);
        }

        $user = auth()->user();

        return $this->response200($this->createToken($user));
    }

    public function handleProviderCallback(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'google_id' => 'required',
            'image_url' => 'required',
        ]);
        $existingUser = User::where('email', $user['email'])->first();

        if ($existingUser) {
            return $this->response200($this->createToken($user));
        } else {
            $newUser                  = new User;
            $newUser->email           = $user['email'];
            $newUser->name            = $user['name'];
            $newUser->first_name      = $user['first_name'];
            $newUser->last_name       = $user['last_name'];
            $newUser->google_id       = $user['google_id'];
            $newUser->image_url       = $user['image_url'];
            $newUser->save();
        }

        $newUserResource = User::where('email', $user['email'])->first();
        return $this->response200($this->createToken($newUserResource));
    }
}
