<?php


use App\Providers\RouteServiceProvider;


beforeEach(function () {
    Route::get('/middleware-auth-test', function () {
        return 'nice';
    })->middleware('auth');
});

it('allows authenticated user to access the route')
    ->expectAuthUser()
    ->canAccessUrl('/middleware-auth-test');

it('does not allow unauthenticated user to access the route')
    ->expectGuest()
    ->toBeRedirectedForUrl('/middleware-auth-test');

test('only authenticated user can access the routes')
    ->with([
        'Logout' => ['auth.logout'],
    ])
    ->tap(function ($route) {
        $this->assertRouteUsesMiddleware($route, ['auth']);
    });


