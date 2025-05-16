<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'status', 'project_id', 'author_id', 'assigned_to', 'due_date',
    ];

    // Проект, до якого належить задача
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Автор задачі
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Виконавець задачі
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Коментарі до задачі
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Файли до задачі
    public function files()
    {
        return $this->hasMany(File::class, 'entity_id')->where('entity', 'task');
    }
}
