<?php

use App\Models\User;
use function Pest\Laravel\get;
use App\Providers\RouteServiceProvider;
use Inertia\Testing\AssertableInertia as Assert;

const ROUTE_PASSWORD_RESET  = 'auth.password.reset';

it('redirects authenticated user', function () {
    expect(User::factory()->create())
        ->toBeRedirectedFor(route(ROUTE_PASSWORD_RESET, [
            '12312312'
        ]),RouteServiceProvider::HOME);
});

it('shows the password reset page', function () {
    get(route(ROUTE_PASSWORD_RESET, [
        '12312312'
    ]))->assertOk();
});

it('allows a user to reset their password.', function () {
    $user = User::factory()->create();

    $token = Password::createToken($user);

    $this->post('/password/reset', [
        'token' => $token,
        'email' => $user->email,
        'password' => 'Oklahoma#12',
        'password_confirmation' => 'Oklahoma#12'
    ])->assertRedirect(RouteServiceProvider::HOME);
});
