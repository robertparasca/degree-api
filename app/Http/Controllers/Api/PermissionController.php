<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return $this->response200(['permissions' => $permissions]);
    }
}
