<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request)
    {
        return $this->response200($request->user());
    }

    public function userPermission(Request $request)
    {
        $id = $request->user()->id;
        $userPermissions = User::where('id', $id)->with('permissions')->first();
        return $this->response200($userPermissions);
    }
}
