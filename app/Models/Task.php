<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'priority',
        'status',
        'due_date',
        'access_token',
        'token_expires_at',
        'user_id',
        'share_token',
        'share_expires_at',
        'reminder_sent_at',
    ];

    protected $dates = [
        'due_date',
        'token_expires_at',
    ];

    protected $casts = [
        'due_date' => 'date',
        'token_expires_at' => 'datetime',
        'share_expires_at' => 'datetime',
        'reminder_sent_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generuje unikalny token do publicznego udostępnienia zadania.
     */
    public function generateAccessToken($expiresInDays = 1): void
    {
        $this->access_token = Str::random(64);
        $this->token_expires_at = now()->addDays($expiresInDays);
        $this->save();
    }

    /**
     * Sprawdza, czy token jest aktywny.
     */
    public function isTokenValid(): bool
    {
        return $this->access_token !== null && $this->token_expires_at !== null
            && now()->lessThanOrEqualTo($this->token_expires_at);
    }

    public function histories()
    {
        return $this->hasMany(TaskHistory::class);
    }

}
