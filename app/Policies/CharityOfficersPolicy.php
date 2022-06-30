<?php

namespace App\Policies;

use App\Models\Charity\CharityOfficers;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharityOfficersPolicy
{
    use HandlesAuthorization;

    public function update(User $user, CharityOfficers $charityOfficers)
    {
        // dd($user->id == $charityOfficers->charity_id);

        return $user->id == $charityOfficers->charity_id;
    }

    public function delete(User $user, CharityOfficers $charityOfficers)
    {
        return $user->id == $charityOfficers->charity_id;
    }
}
