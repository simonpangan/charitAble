<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


beforeEach(function () {
    $this->request = Request::create('/admin', 'GET')->setUserResolver(function() {
        return Auth::user();
    });

    $this->next = function (Request $request) {
        $this->assertTrue(true);
    };
});

it('should call next call back if user is admin', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['ADMIN']
    ]);

    $this->actingAs($user);

    checkRoleMiddleware($this->request, $this->next , "ADMIN");
});

it('should call next call back if user is benefactor', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['BENEFACTOR']
    ]);

    $this->actingAs($user);

    checkRoleMiddleware($this->request, $this->next , "BENEFACTOR");
});

it('should call next call back if user is charity super admin', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['CHARITY_SUPER_ADMIN']
    ]);

    $this->actingAs($user);

    checkRoleMiddleware($this->request, $this->next , "CHARITY_SUPER_ADMIN");
});

it('should call next call back if user is charity admin', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['CHARITY_ADMIN']
    ]);

    $this->actingAs($user);

    checkRoleMiddleware($this->request, $this->next , "CHARITY_ADMIN");
});

it('should call next call back if user is charity admin or charity superadmin', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['CHARITY_ADMIN']
    ]);

    $this->actingAs($user);

    checkRoleMiddleware($this->request, $this->next , "CHARITY_ADMIN", "CHARITY_SUPER_ADMIN");
});

it('should throw an error if user has different role', function () {
    $user = User::factory()->create([
        'role_id' => Role::USERS['CHARITY_ADMIN']
    ]);

    $this->actingAs($user);

    expect(fn() => checkRoleMiddleware($this->request, $this->next , "ADMIN"))
        ->toThrow(Exception::class);
});

