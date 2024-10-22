<?php

namespace App\Enums\ViewPath\Admin;

enum EmployeeEnum
{
    const INDEX = [
        URI => '/index',
        VIEW => 'admin.employee.index'
    ];
    const LIST = [
        URI => '/list',
        VIEW => 'admin.employee.list'
    ];
    const UPDATE = [
        URI => '/update',
        VIEW => 'admin.employee.update'
    ];
    const DELETE = [
        URI => '/delete',
    ];
}
