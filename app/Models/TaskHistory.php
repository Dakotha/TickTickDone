<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskHistory extends Model
{
    protected $fillable = [
        'task_id',
        'field',
        'old_value',
        'new_value',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
