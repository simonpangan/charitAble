<?php

use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


beforeEach(function () {
    $this->request = Request::create('/admin', 'GET')
        ->setUserResolver(function() {
        return Auth::user();
    });

    $this->next = function (Request $request) {
        $this->assertTrue(true);
    };
});


it('should call next call back if user is admin')
    ->tap(function () {
        createAuthUserWithRole("ADMIN");
        checkRoleMiddleware($this->request, $this->next , "ADMIN");
    });

it('should call next call back if user is benefactor')
    ->tap(function () {
        createAuthUserWithRole("BENEFACTOR");
        checkRoleMiddleware($this->request, $this->next , "BENEFACTOR");
    });

it('should call next call back if user is charity super admin')
    ->tap(function () {
       createAuthUserWithRole("CHARITY_SUPER_ADMIN");
        checkRoleMiddleware($this->request, $this->next , "CHARITY_SUPER_ADMIN");
    });

it('should call next call back if user is charity admin')
    ->tap(function () {
       createAuthUserWithRole("CHARITY_ADMIN");
        checkRoleMiddleware($this->request, $this->next , "CHARITY_ADMIN");
    });

it('should call next call back if user is charity admin or charity superadmin')
    ->tap(function () {
       createAuthUserWithRole("CHARITY_ADMIN");
        checkRoleMiddleware($this->request, $this->next , "CHARITY_ADMIN" , "CHARITY_SUPER_ADMIN");
    });

it('should throw an error if user has different role')
    ->tap(function () {
       createAuthUserWithRole("CHARITY_ADMIN");

        expect(fn() => checkRoleMiddleware($this->request, $this->next , "ADMIN"))
            ->toThrow(Exception::class);
    });


function checkRoleMiddleware($request, $next, ...$roles)
{
    return  (new \App\Http\Middleware\RoleChecker())->handle($request, $next, ...$roles);
}
