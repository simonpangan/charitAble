<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\post;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

$user = [
    'name' => 'Simon',
    'email' => 'simon_pangan@yahoo.com',
    'password' => 'Oklahoma#12',
    'password_confirmation' => 'Oklahoma#12',
];

it('shows the login page')
    ->get('/register')
    ->assertOk();

it('redirects authenticated user', function () {
    expect(User::factory()->create())->toBeRedirectedFor(url: '/register', to: RouteServiceProvider::HOME);
});

it('has errors if the details are not provided')
    ->post('/register')
    ->assertSessionHasErrors([
        'name',
        'email',
        'password'
    ]);

it('has errors if the details are not string')
    ->post('register', [
        'name' =>  123,
        'email' => 123,
        'password' => 123123123,
        'password_confirmation' => 123123123,
    ])
    ->assertSessionHasErrors([
        'name',
        'email',
        'password'
    ]);

it('has errors if email format is wrong')
    ->tap(function () {

        post('register', [
            'email' => '“contact”@[192.168.0.1]',
        ])
        ->assertSessionHasErrors([
            'email',
        ]);

        post('register', [
            'email' => 'harry@gmail.con',
        ])
        ->assertSessionHasErrors([
            'email',
        ]);

        post('register', [
            'name' => 'simon',
            'email' => 'simonpangan@yahoo.com',
            'password' => 'Oklahoma#12',
            'password_confirmation' => 'Oklahoma#12',
        ])
        ->assertSessionHasNoErrors();

    });

it('has error if email exists')
    ->tap(function () {
        $user = User::factory()->create();

        post('register', [
            'name' => 'Simon',
            'email' => $user->email,
            'password' => 'SimonSimonSimonSimon',
            'password_confirmation' => 'SimonSimonSimonSimon',
        ])
        ->assertSessionHasErrors([
            'email',
        ]);;
    });

it('has errors if password confirmation does not exist')
    ->tap(function () {
        post('register', [
            'name' => 'Simon',
            'email' => 'simonpangan@yahoo.com',
            'password' => 'Oklahoma#12',
        ])
        ->assertSessionHasErrors([
            'password',
        ]);

        post('register', [
            'name' => 'Simon',
            'email' => 'simonpangan@yahoo.com',
            'password' => 'Oklahoma#12',
            'password_confirmation' => 'Oklahoma#12',
        ])
        ->assertSessionHasNoErrors();;
    });

it('should accept correct password format')
    ->post('register', [
        'name' => 'simon',
        'email' => 'simonpangan@yahoo.com',
        'password' => 'Oklahoma#12',
        'password_confirmation' => 'Oklahoma#12',
    ])
    ->assertSessionHasNoErrors();

it('registers the user')
    ->tap(function () {
        $this->post('/register', [
            'name' => 'Simon',
            'email' => 'simonpangan@yahoo.com',
            'password' => 'Oklahoma#12',
            'password_confirmation' => 'Oklahoma#12',
        ])
        ->assertRedirect(RouteServiceProvider::HOME);
    })
    ->assertDatabaseHas('users', [
        'name' => 'Simon',
        'email' => 'simonpangan@yahoo.com',
    ])
    ->assertAuthenticated();




