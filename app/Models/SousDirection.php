<?php

namespace App\Models;

use App\Models\Direction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousDirection extends Model
{
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'service_id');
    }
    
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
