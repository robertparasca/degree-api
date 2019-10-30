<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\User;

class UserController extends Controller
{
    public function me(BaseRequest $request)
    {
        $id = $request->user()->id;
        $user = User::where('id', $id)->with('permissions')->first();
        return $this->response200(['user' => $user]);
    }

    public function index(BaseRequest $request)
    {
        $users = User::orderBy('name')->get();
        return $this->response200(['users' => $users]);
    }
}
