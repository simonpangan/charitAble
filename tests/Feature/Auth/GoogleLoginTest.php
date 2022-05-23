<?php

use function Pest\Laravel\get;
use \App\Providers\RouteServiceProvider;
use Inertia\Testing\AssertableInertia as Assert;

it('redirects to google', function () {
    $response = get('/login-google');
    $this->assertStringContainsString('google.com/o/oauth2', $response->getTargetUrl());
});

it('login using google', function () {
    $abstractUser = mock('Laravel\Socialite\Two\User');
    $abstractUser->email = 'simon_pangan@yahoo.com';
    $abstractUser->user['given_name'] = 'simon';
    $abstractUser->user['family_name'] = 'pangan';

    Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

    $routeName = RouteServiceProvider::HOME['BENEFACTOR'];

    get('login-google-callback')
        ->assertRedirect(route($routeName));

    get(route($routeName))
        ->assertInertia(fn (Assert $page) => $page
            ->component('Benefactor/Index')
        );
});


it('renders the correct component', function () {
    $abstractUser = mock('Laravel\Socialite\Two\User');
    $abstractUser->email = 'simon_pangan@yahoo.com';
    $abstractUser->user['given_name'] = 'simon';
    $abstractUser->user['family_name'] = 'pangan';

    Socialite::shouldReceive('driver->user')->andReturn($abstractUser);

    $routeName = RouteServiceProvider::HOME['BENEFACTOR'];

    get('login-google-callback');

    get(route($routeName))
        ->assertInertia(fn (Assert $page) => $page
            ->component('Benefactor/Index')
        );
});
