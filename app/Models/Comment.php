<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'task_id', 'user_id', 'content',
    ];

    // Задача
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // Користувач
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
