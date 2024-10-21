<?php

namespace App\Trait;

trait ModulePermissionTrait
{
    protected  function modulePermissionCheck($moduleName): bool
    {
        $userRole = auth('admins')->user()->role;
        $permission = $userRole->module_access;
        if (isset($permission) && $userRole->status == 1 && in_array($moduleName, (array)json_decode($permission)) == true) {
            return true;
        }
        if (auth('admins')->user()->admin_role_id == 1) {
            return true;
        }
        return false;
    }
}
