<?php

namespace App\Models;

use App\Models\SousDirection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    public function sousDirection(): BelongsTo
    {
        return  $this->belongsTo(SousDirection::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
