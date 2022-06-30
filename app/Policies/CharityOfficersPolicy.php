<?php

namespace App\Policies;

use App\Models\Charity\CharityOfficers;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharityOfficersPolicy
{
    use HandlesAuthorization;

    public function modify(User $user, CharityOfficers $charityOfficers)
    {
        return $user->id == $charityOfficers->charity_id;
    }
}
