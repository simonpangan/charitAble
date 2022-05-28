<?php


use Illuminate\Http\Request;
use function Pest\Laravel\post;
use \Symfony\Component\HttpFoundation\Response;


beforeEach(function () {
    Route::post('/middleware-auth-test', function (Request $request) {
        return 'nice';
    })->middleware('throttle:6,1');
});

it('allows authenticated user to access the route')
    ->tap(function () {
        for ($attempt = 0; $attempt < 6; $attempt++) {
            post('/middleware-auth-test')->assertStatus(Response::HTTP_OK);
        }

        post('/middleware-auth-test')->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
    });

test('can only send request 6 times per minute for route')
    ->with([
        'Email Verification Resend' => ['auth.verification.send'],
        'Email Verification Verify Page' => ['auth.verification.verify'],
    ])
    ->tap(function ($route) {
        $this->assertRouteUsesMiddleware($route, ['throttle:6,1']);
    });


