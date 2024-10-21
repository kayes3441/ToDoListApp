<?php

namespace App\Services;

class AdminService
{
    public function getAdminData(object|array $request,int $roleId):array
    {
        return [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'admin_role_id'    => $roleId,
            'password' => bcrypt($request['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    public function getAdminRoleData(object|array $request):array
    {
        return [
            'name'     => $request['role'],
            'module_access'     => json_encode($request['modules']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
