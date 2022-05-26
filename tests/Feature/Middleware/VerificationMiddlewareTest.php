<?php

use App\Providers\RouteServiceProvider;
use function Pest\Laravel\get;
use \Symfony\Component\HttpFoundation\Response;


beforeEach(function () {
    Route::get('/middleware-test', function () {
        return 'nice';
    })->middleware('verified:auth.verification.notice');
});

it('does not allow unverified user to access the route')
    ->tap(function () {
        expectUnverifiedUser()
            ->toBeRedirectedForUrl('/middleware-test', to: route('auth.verification.notice'));
    });

it('allows verified user to access the route')
    ->expectAuthVerifiedUser()
    ->canAccessUrl('middleware-test');

test('only allows verified user can access the routes')
    ->with([
        'Charity Admin Index' => ['admin.index'],
    ])
    ->tap(function ($route) {
        $this->assertRouteUsesMiddleware($route, ['verified:auth.verification.notice']);
    });
