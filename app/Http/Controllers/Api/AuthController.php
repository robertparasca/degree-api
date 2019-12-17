<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OneTimeToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        /*
         * search in users table if the email exists.
         * if not, look in the students table for the email.
         * what if the email exists in both tables?
         * well, somehow, i should make sure that the email does not exists in both tables.
         * Popescu Ion e student la IS.
         * Dau import la excelul pentru anul 1. In excel, Popescu are contul de email popescu.ion@gmail.com
         * Pentru ca e la IS, i se genereaza si contul de google. popescu.ion@ac.tuiasi.ro.
         * Ce fac daca Popescu se conecteaza cu email-ul și parola din excel, dar și cu google-ul?
         */
//        dd($validatedData['email']);

        if (!auth()->attempt($validatedData)) {
            return $this->response422(['message' => 'Invalid credentials']);
        }

        $user = User::where('id', $request->user()->id)->with('permissions')->first();

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
        $existingUser = User::where('email', $user['email'])->with('permissions')->first();

        if ($existingUser) {
            return $this->response200($this->createToken($existingUser));
        } else {
            $newUser                  = new User;
            $newUser->email           = $user['email'];
            $newUser->name            = $user['name'];
            $newUser->first_name      = $user['first_name'];
            $newUser->last_name       = $user['last_name'];
            $newUser->google_id       = $user['google_id'];
            $newUser->image_url       = $user['image_url'];
            $newUser->save();
            // todo: somehow trigger the script (to be created) that adds the default permissions (also to be saved) to the $newUser
        }

        $newUserResource = User::where('email', $user['email'])->first();
        return $this->response200($this->createToken($newUserResource));
    }

    public function oneTimeToken(Request $request)
    {
        Mail::to($request->user())->send(new OneTimeToken());
    }
}
