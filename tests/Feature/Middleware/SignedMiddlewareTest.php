<?php



test('route is protected by signed middleware')
    ->with([
        'Email Verification Verify' => ['auth.verification.verify'],
    ])
    ->tap(function ($route) {
        $this->assertRouteUsesMiddleware($route, ['signed']);
    });


