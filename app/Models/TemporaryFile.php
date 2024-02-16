<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryFile extends Model
{
    use HasFactory;

    protected $fillable = ['folder', 'filename'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
