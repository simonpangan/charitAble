<?php

use App\Providers\RouteServiceProvider;

beforeEach(function () {
    Route::get('/middleware-test', function () {
        return 'nice';
    })->middleware('guest');
});


it('allows guest user to access the route')
    ->expectGuest()
    ->canAccessUrl('/middleware-test');

it('does not allow unauthenticated user to access the route')
    ->expectAuthUser()
    ->toBeRedirectedForUrl('/middleware-test');

it('redirects every user role in their corresponding route')
    ->with([ 'BENEFACTOR',  'ADMIN',  'CHARITY_ADMIN',  'CHARITY_SUPER_ADMIN'])
    ->tap(function ($role) {
        expectAuthUserWithRole($role)
            ->toBeRedirectedForUrl('/middleware-test', to: route(RouteServiceProvider::HOME[$role]));
    });

test('only guest can access the routes')
    ->with([
        'Charity Benefactor Page' => ['register.benefactor'],
        'Charity Registration Page' => ['register.charity'],
    ])
    ->tap(function ($route) {
        $this->assertRouteUsesMiddleware($route, ['guest']);
    });
