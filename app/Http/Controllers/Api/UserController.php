<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\PermissionUser;
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

    public function show(BaseRequest $request)
    {
        $user = User::where('id', $request->id)->with('permissions')->first();
        return $this->response200(['user' => $user]);
    }

    public function updatePermissions(BaseRequest $request)
    {
        if ($request->get('state')) {
            $permission = new PermissionUser();
            $permission->user_id = $request->id;
            $permission->permission_id = $request->get('permissionId');
            $permission->save();
        } else {
            $permission = PermissionUser::where('user_id', $request->id)->where('permission_id', $request->get('permissionId'))->delete();
        }
        return $this->response200($permission);
    }
}
