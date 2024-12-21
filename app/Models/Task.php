<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'priority',
        'status',
        'due_date',
        'share_token',
        'token_expires_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TaskHistory::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'to-do' => 'To do',
            'in progress' => 'In progress',
            'done' => 'Done',
            default => 'Unknown',
        };
    }

    public function getPriorityLabelAttribute(): string
    {
        return match ($this->priority) {
            'low' => 'Low',
            'medium' => 'Medium',
            'high' => 'High',
            default => 'Unknown',
        };
    }

    protected function dueDate(): Attribute
    {
        return Attribute::get(
            fn ($value) => $value ? Carbon::parse($value)->format('Y-m-d') : null
        );
    }

    protected static function booted()
    {
        static::updated(function (Task $task) {
            foreach ($task->getChanges() as $field => $newValue) {
                if (!in_array($field, ['updated_at'])) {
                    TaskHistory::create([
                        'task_id' => $task->id,
                        'field' => $field,
                        'old_value' => $task->getOriginal($field),
                        'new_value' => $newValue,
                    ]);
                }
            }
        });
    }

    public function generateShareToken()
    {
        $this->share_token = Str::random(32);
        $this->token_expires_at = now()->addHours(24);
        $this->save();
    }

    public function isTokenValid()
    {
        return $this->share_token && $this->token_expires_at > now();
    }
}
