<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Користувач має багато проектів
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // Користувач створює багато задач (author)
    public function tasks()
    {
        return $this->hasMany(Task::class, 'author_id');
    }

    // Користувач як виконавець задач (assigned)
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    // Користувач має багато коментарів
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Прикріплені файли до користувача
    public function files()
    {
        return $this->hasMany(File::class, 'entity_id')->where('entity', 'user');
    }
}
