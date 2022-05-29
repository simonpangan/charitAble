<?php

use function Pest\Laravel\get;


it('redirects to google', function () {
    $response = get('/login-google');

    $response->assertRedirect($response->getTargetUrl());
    $this->assertStringContainsString('google.com/o/oauth2', $response->getTargetUrl());
});

it('logins user using google',)
    ->tap(function () {
        mockSocaliteLaravel();
        get('login-google-callback');
    })
    ->assertAuthenticated();

it('redirects to correct route', function () {
    mockSocaliteLaravel();

    get('login-google-callback')
        ->assertRedirect($this->redirectTo());
});


function mockSocaliteLaravel() {
    $abstractUser = mock('Laravel\Socialite\Two\User');
    $abstractUser->email = 'simon_pangan@yahoo.com';
    $abstractUser->user['given_name'] = 'simon';
    $abstractUser->user['family_name'] = 'pangan';

    Socialite::shouldReceive('driver->user')->andReturn($abstractUser);
}
