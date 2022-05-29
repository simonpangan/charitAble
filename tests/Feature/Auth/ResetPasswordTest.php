<?php


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Symfony\Component\HttpFoundation\Response;
use Inertia\Testing\AssertableInertia as Assert;


const ROUTE_PASSWORD_RESET  = 'auth.password.reset';
const ROUTE_PASSWORD_UPDATE  = 'auth.password.update';


//Route Test
it('shows the password reset page')
    ->getRoute(ROUTE_PASSWORD_RESET, [
        'token' => '::token::'
    ])
    ->assertOk();


//Component Test
it('renders the correct component')
    ->getRoute(ROUTE_PASSWORD_RESET, [
        'token' => '::token::',
        'email' => 'valid@email.com'
    ])
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/Password/Reset')
        ->where('token', '::token::')
        ->where('email', 'valid@email.com')
    );

it('pass props correctly')
    ->getRoute(ROUTE_PASSWORD_RESET, [
        'token' => '::token::',
        'email' => 'valid@email.com'
    ])
    ->assertInertia(fn (Assert $page) => $page
        ->where('token', '::token::')
        ->where('email', 'valid@email.com')
    );


it('resets password of user')
    ->tap(function () {
        $user = User::factory()->create();

        $token = Password::createToken($user);

        $newPassword = 'Oklahoma#12';

        postRoute(ROUTE_PASSWORD_UPDATE, [
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword
        ])->assertStatus(Response::HTTP_FOUND);

        $newPasswordInDatabase = User::latest()->first()->password;

        $isTheSameHash = Hash::check($newPassword, $newPasswordInDatabase);

        expect($isTheSameHash)->toBeTrue();
    });

