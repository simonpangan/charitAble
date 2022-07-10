<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Support\Carbon;
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
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toDayDateTimeString();
    }


    public function scopeOrderByTimestamp($query, $field)
    {
        if ($field['order'] != 'timestamp') 
        {
            return;
        }

        if ($field['sort'] == 'desc')
        {
            return $query->oldest();
        } 

        return $query->latest();
    }

    public function scopeVisibleTo($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}

