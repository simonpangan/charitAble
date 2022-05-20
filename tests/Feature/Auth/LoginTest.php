<?php

use App\Models\User;
use function Pest\Laravel\post;
use Illuminate\Support\Facades\Hash;
use \App\Providers\RouteServiceProvider;
use Inertia\Testing\AssertableInertia as Assert;
use function Pest\Laravel\withoutExceptionHandling;

it('shows the login page')
    ->get('/login')
    ->assertOk()
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/Login')
    );

it('redirects authenticated user', function () {
    expect(User::factory()->create())->toBeRedirectedFor(url: '/login', to: RouteServiceProvider::HOME);
});

it('shows an error if the details are not provided')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);

it('logs the user in')
    ->tap(function () {
        $user = User::factory()->create([
            'password' => Hash::make('simonpangan11')
        ]);

        post('/login', [
            'email' => $user->email,
            'password' => 'simonpangan11'
        ]);
    })
    ->assertAuthenticated();

it('redirects to correct route when the user logs in')
    ->tap(function () {
        $user = User::factory()->create([
            'password' => Hash::make('simonpangan11')
        ]);

        post('/login', [
            'email' => $user->email,
            'password' => 'simonpangan11'
        ])->assertRedirect(RouteServiceProvider::HOME);
    });

it('shows error when tries to login 5 times per minute')
    ->tap(function () {
        $user = User::factory()->create([
            'password' => Hash::make('simonpangan11')
        ]);

        for ($attempt = 0; $attempt < 4; $attempt++) {
            post('/login', [
                'email' => $user->email,
                'password' => 'simonpangan1122'
            ]);
        }
        withoutExceptionHandling()->post('/login', [
            'email' => $user->email,
            'password' => 'simonpangan11'
        ]);
    })
    ->assertAuthenticated();


