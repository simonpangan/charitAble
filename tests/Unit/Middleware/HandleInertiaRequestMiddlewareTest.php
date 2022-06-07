<?php


use Illuminate\Http\Request;
use App\Http\Middleware\HandleInertiaRequests;



beforeEach(function () {
    $this->middleware = new HandleInertiaRequests();
});


test('middleware should merge flash resent for email verification', function () {
    $request = Request::create('/email/verify');

    $props = $this->middleware->share($request);

    expect($props)->toHaveKeys(['flash.resent']);
    expect($props)->toHaveKeys(['flash.message']);
});

test('middleware should merge flash status for password reset', function () {
    $request = Request::create('/password/reset');

    $props = $this->middleware->share($request);

    expect($props)->toHaveKeys(['flash.status']);
    expect($props)->toHaveKeys(['flash.message']);
});

