<?php

use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use \App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Inertia\Testing\AssertableInertia as Assert;

const ROUTE_PASSWORD_EMAIL  = 'auth.password.email';
const ROUTE_PASSWORD_REQUEST  = 'auth.password.request';

it('shows the password reset page', function () {
    get(route(ROUTE_PASSWORD_REQUEST))
        ->assertOk();
});

it('shows the correct component for password reset page', function () {
    get(route(ROUTE_PASSWORD_REQUEST))
        ->assertInertia(fn (Assert $page) => $page
            ->component('Auth/Password/Email')
        );
});

it('redirects authenticated user', function () {
    expect(User::factory()->create())
        ->toBeRedirectedFor(route(ROUTE_PASSWORD_REQUEST),RouteServiceProvider::HOME);
});

it('shows an error if email is not provided', function () {
    post(route(ROUTE_PASSWORD_EMAIL))
        ->assertSessionHasErrors('email');
});

it('shows an error if the email format is wrong', function () {
    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => 123,
    ])
    ->assertSessionHasErrors('email');

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => "simon",
    ])
    ->assertSessionHasErrors('email');
});

it('sends a link if email is valid', function () {
    $user = User::factory()->create();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])
    ->assertSessionHasNoErrors();
});

it('send actual notification in user\'s email ', function () {
    $user = User::factory()->create();

    //MocksApplicationServices
    $this->expectsNotification($user, ResetPassword::class);

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ]);
});

it('does not send a password reset email when the user does not exist ', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => 'simonpangan@yahoo.com',
    ]);

    Notification::assertNotSentTo(
        [$user], ResetPassword::class
    );
});

it('shows an error for 2 consecutively request', function () {
    $user = User::factory()->create();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])->assertSessionHasNoErrors();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])->assertSessionHasErrors();
});

it('allows another request after 1 minute', function () {
    $user = User::factory()->create();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])->assertSessionHasNoErrors();

    $this->travel(1)->minutes();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])->assertSessionHasNoErrors();

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ])->assertSessionHasErrors();
});
