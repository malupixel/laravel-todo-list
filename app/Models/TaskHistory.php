<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'task_id',
        'user_id',
        'name',
        'description',
        'priority',
        'status',
        'due_date',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

