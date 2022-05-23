<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/
use Illuminate\Contracts\Auth\Authenticatable;

uses(Tests\TestCase::class)->in('Feature', 'Unit');
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeRedirectedFor', function (String $url, String $to, String $method = 'get') {
    $response = null;

    if (! $this->value) {
        $response = test()->{$method}($url);
    } else {
        $response = actingAs($this->value)->{$method}($url);
    }

    $response->assertRedirect($to);

    return  $response->assertStatus(302);
});
/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function actingAs(Authenticatable $user)
{
    return test()->actingAs($user);
}

function expectGuest()
{
    return test()->expect(null);
}


function checkRoleMiddleware($request, $next, ...$roles)
{
    return  (new \App\Http\Middleware\RoleChecker())->handle($request, $next, ...$roles);
}
