<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direction extends Model
{    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function sousDirection(): HasMany
    {
        return $this->hasMany(SousDirection::class, 'sous-direction_id', 'id');
    }    
}
