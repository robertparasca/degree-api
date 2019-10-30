<?php

namespace App\Traits;

use App\Permission;

trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('name', $permission)->count();
    }
}
