<?php

namespace App\Services;

class TaskService
{
    public function getAddUpdateData(object|array $request):array
    {
        return [
            'title'     => $request['title'],
            'description'    => $request['description'],
            'assign_to'    => $request['assign_to'],
            'priority'    => $request['priority'],
            'start_date'    => $request['start_date'],
            'end_date'    => $request['end_date'],
            'status'  => $request['status'] ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
