<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'user_id',
    ];

    // Автор проекту
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Проект має багато задач
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Файли, прикріплені до проекту
    public function files()
    {
        return $this->hasMany(File::class, 'entity_id')->where('entity', 'project');
    }
}
