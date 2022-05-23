<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const USERS = [
        'ADMIN' => 1,
        'CHARITY_SUPER_ADMIN' => 2,
        'CHARITY_ADMIN' => 3,
        'BENEFACTOR' => 4
    ];
}
