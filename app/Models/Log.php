<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'activity',
    ];

    public $casts = [
        'activity' => 'encrypted',
        'created_at' => 'datetime:l\\, F jS Y\\, h:i:s A',
    ];
}
