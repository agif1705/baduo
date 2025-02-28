<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $casts = [
        'is_banned' => 'boolean',
    ];
    protected $fillable = [
        'user_id',
        'shift_id',
        'kantor_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
    public function kantor(): BelongsTo
    {
        return $this->belongsTo(Kantor::class);
    }
}
