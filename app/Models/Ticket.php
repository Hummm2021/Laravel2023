<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    // use HasFactory;

    protected $fillable = [
        'title',
        'content',
        // 'status_id',
        'created_at',
        'updated_at',
        // 'deleted_at',
        // 'priority_id',
        // 'category_id',
        'author_name',
        'author_email',
        'assigned_to_user_id',
    ];

    public $table = 'tickets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    

    // public function tickets()
    // {
    //     return $this->hasMany(Ticket::class, 'assigned_to_user_id', 'id');
    // }

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }


    
}
