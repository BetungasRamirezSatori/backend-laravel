<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskUser extends Pivot
{
    protected $fillable = [
        'due_date',
        'user_id',
        'task_id',
        'state_id'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
