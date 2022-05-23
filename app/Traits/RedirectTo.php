<?php

namespace App\Traits;


use App\Models\Role;
use App\Providers\RouteServiceProvider;


trait RedirectTo
{
    public function redirectTo(): string
    {
        /*
            Flip the key-value in the role class constant to get the corresponding role name of a specific role id.
            Then get the role name of the authenticated user using its role id
         */
        $systemRoles = collect(Role::USERS)->flip();
        $userRole = $systemRoles->get(auth()->user()->role_id);

        //Get the homepage route name of the user role
        $routeName = RouteServiceProvider::HOME[$userRole];

        return route($routeName);
    }
}
