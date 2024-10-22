<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'assign_to',
        'start_date',
        'priority',
        'end_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'title'=>'string',
        'description'=>'string',
        'priority'=>'integer',
        'assign_to'=>'integer',
        'start_date'=>'datetime',
        'end_date'=>'datetime',
    ];

    public function assignTo():BelongsTo
    {
        return $this->belongsTo(Admin::class,'assign_to');
    }
}
