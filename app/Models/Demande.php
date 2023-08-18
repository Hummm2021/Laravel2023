<?php

namespace App\Models;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'object',
        'description',
    ];

    public function interventions(): hasMany
    {
        return $this->hasMany(Intervention::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    // public function user()
    // {
    // return $this->belongsTo(User::class, 'user_id');
    // }
}
