<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Contracts\Auth\Authenticatable;


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

uses(Tests\TestCase::class)->in('Feature', 'Unit');
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)->in('Feature', 'Unit');


uses()->beforeEach( fn () => withoutMiddleware() )->in('Feature/Charity');

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

expect()->extend('toBeRedirectedForUrl', function (String $url, String $to = null, String $method = 'get') {
    $response = null;

    if (! $this->value) {
        $response = test()->{$method}($url);
    } else {
        $response = actingAs($this->value)->{$method}($url);
    }

    $response->assertRedirect($to);

    return  $response->assertStatus(302);
});

expect()->extend('toBeRedirectedForRoute', function (String $route, String $to = null, String $method = 'get') {
    $response = null;

    if (! $this->value) {
        $response = test()->{$method}(route($route));
    } else {
        $response = actingAs($this->value)->{$method}(route($route));
    }

    if (! is_null($to)) {
        $response->assertRedirect(route($to));
    }

    return  $response->assertStatus(302);
});

expect()->extend('canAccessUrl', function (String $url, String $to = null, String $method = 'get') {
    if (! $this->value) {
        $response = test()->{$method}($url);
    } else {
        $response = actingAs($this->value)->{$method}($url);
    }

    return  $response->assertOk();
});

expect()->extend('toBeRedirectedTo', function (String $routeName) {
    $this->value->assertStatus(302);

    return  $this->value->assertRedirect(route($routeName));
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

//Expects

function expectGuest()
{
    return test()->expect(null);
}

function expectAuthUser() {
    return test()->expect(createUser());
}

function expectAuthVerifiedUser() {
    return test()->expect(createUser());
}

function expectAuthUserWithRole(String $role) {
    return test()->expect(createUserWithRole($role));
}

function expectUnverifiedUser() {
    return test()->expect(createUnverifiedUser());
}

//Create
function createAuthUserWithRole(String $role) {
    return actingAs(createUserWithRole($role));
}

function createAuthUnverifiedUser() {
    return actingAs(createUnverifiedUser());
}
function createAuthCharityUser() {
    $user = User::factory()->create([
        'role_id' => Role::USERS['CHARITY_ADMIN']
    ]); 
    
    $user->charity()->save(
        Charity::factory()->makeOne()
    );
    return actingAs($user);
}

function createAuthUser() {
    return actingAs(createUser());
}

function createUser() {
    return User::factory()->create();
}

function createUserWithRole($role) {
    return User::factory()->create([
        'role_id' => Role::USERS[$role]
    ]);
}


function createCharityUser() {
    return User::factory()->create([
        'role_id' => Role::USERS['CHARITY_ADMIN']
    ])->charity()->save(
        Charity::factory()->makeOne()
    );
}

function createUnverifiedUser() {
    return User::factory()->unverified()->create();
}

//----

function actingAs(Authenticatable $user)
{
    return test()->actingAs($user);
}

function getRoute(String $routename, Array|int $parameters = [])
{
    return test()->get(route($routename, $parameters));
}

function postRoute(String $routeName, Array $parameters = [], Array|int $query = null)
{
    return test()->post(route($routeName, $query), $parameters);
}

function putRoute(String $routeName, Array $parameters = [], Array|int $query = null)
{
    return test()->put(route($routeName, $query), $parameters);
}
function deleteRoute(String $routeName, int $id)
{
    return test()->delete(route($routeName, [
        'id' => $id
    ]));
}


function withoutMiddleware()
{
    return test()->withoutMiddleware();
}



//MODELS

function createCharityPost() {
    createAuthCharityUser();

    return CharityVolunteerPost::factory()->createOne();
}

function createCharityProgram() {
    createAuthCharityUser();

    return CharityProgram::factory()->createOne();
}




