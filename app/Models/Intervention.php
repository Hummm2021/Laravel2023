<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Intervention extends Model
{
    use HasFactory;

    public $fillable = [
        'type_depannage',
        'nature_probleme',
        'operation_effectuee',
        'status',
        'date_depannage',
    ];

    public function demande(): belongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
