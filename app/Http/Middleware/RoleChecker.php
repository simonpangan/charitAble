<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $middlewareRoleChecker = collect($roles);

        $canBeAccessByMultipleUserRoles = $middlewareRoleChecker->count() > 1;

        /*
          if middleware can be access by multiple user roles, get all of their corresponding role id in the
          Role class constant and check if it contains the authenticated user role id.
       */
        $middlewareRoleChecker->when($canBeAccessByMultipleUserRoles, function () use ($middlewareRoleChecker, $request) {
                    $allowedUserRoles = $middlewareRoleChecker->map(function ($role) {
                        return $this->getUserRoleId($role);
                    });

                    $userHasIncorrectRole = $allowedUserRoles->doesntContain($request->user()->role_id);

                    $middlewareRoleChecker->when($userHasIncorrectRole, function () {
                        $this->abortForbiddenUser();
                    });
                });

        /*
            if middleware can only be access by one user role, get only the first value in the array of roles
            and get its corresponding role id in the Role class constant and compare that to authenticated
            user role id
         */
        $middlewareRoleChecker->when(! $canBeAccessByMultipleUserRoles, function () use ($middlewareRoleChecker, $request) {
                    $allowedUserRole = $this->getUserRoleId($middlewareRoleChecker->first());

                    $userHasIncorrectRole = $request->user()->role_id != $allowedUserRole;

                    $middlewareRoleChecker->when($userHasIncorrectRole, function () {
                        $this->abortForbiddenUser();
                    });
                });

        //process request if user have the correct user role
        return $next($request);
    }

    private function getUserRoleId($allowedUserRole) {
        return Role::USERS[$allowedUserRole];
    }

    private function abortForbiddenUser()
    {
        abort(Response::HTTP_UNAUTHORIZED);
    }
}
