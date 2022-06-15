<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    
    public function getPreferencesAttribute($value)
    {
        return explode(',', $value);
    }
}
