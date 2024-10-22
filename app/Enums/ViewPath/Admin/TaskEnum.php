<?php

namespace App\Enums\ViewPath\Admin;

enum TaskEnum
{
    const INDEX = [
        URI => '/index',
        VIEW => 'admin.task.index'
    ];
    const LIST = [
        URI => '/list',
        VIEW => 'admin.task.list'
    ];
    const UPDATE = [
        URI => '/update',
        VIEW => 'admin.task.update'
    ];
    const DELETE = [
        URI => '/delete',
    ];
}
