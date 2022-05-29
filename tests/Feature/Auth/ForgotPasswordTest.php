 <?php

use function Pest\Laravel\post;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Inertia\Testing\AssertableInertia as Assert;

const ROUTE_PASSWORD_EMAIL  = 'auth.password.email';
const ROUTE_PASSWORD_REQUEST  = 'auth.password.request';


//Route Test
it('shows the password reset page')
    ->getRoute(ROUTE_PASSWORD_REQUEST)
    ->assertOk();


//Component Test
it('shows the correct component for password reset page')
    ->getRoute(ROUTE_PASSWORD_REQUEST)
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/Password/Email')
    );


//Unhappy Path
it('has errors if the details are not provided')
    ->postRoute(ROUTE_PASSWORD_EMAIL)
    ->assertSessionHasErrors([
        'email',
    ]);

 it('redirects back the user if input is invalid', function () {
     $this->from(route(ROUTE_PASSWORD_REQUEST))
         ->post(route(ROUTE_PASSWORD_EMAIL))
         ->assertRedirect(route(ROUTE_PASSWORD_REQUEST));
 });

test('invalid email format', function (String|int $email) {
    postRoute(ROUTE_PASSWORD_EMAIL, [
        'email' => $email
    ])
    ->assertSessionHasErrors(['email' => "The email must be a valid email address."]);
})->with([
    123456,
    'email',
    'email@',
    'email@.com',
    '@.com',
]);

it('does not send a password reset email when the user does not exist ')
    ->tap(function () {
        Notification::fake();

        $user = createUser();

        postRoute(ROUTE_PASSWORD_EMAIL, [
            'email' => 'simonpangan@yahoo.com',
        ]);

        Notification::assertNotSentTo(
            [$user], ResetPassword::class
        );
    });

it('shows an error for having two request under 1 minute')
    ->tap(function () {
        $user = createUser();

        postRoute(ROUTE_PASSWORD_EMAIL, [
            'email' => $user->email,
        ])->assertSessionHasNoErrors();

        postRoute(ROUTE_PASSWORD_EMAIL, [
            'email' => $user->email,
        ])->assertSessionHasErrors();
    });


//Happy Path
it('allows another request after 1 minute')
    ->tap(function () {
        $user = createUser();

        postRoute(ROUTE_PASSWORD_EMAIL, [
            'email' => $user->email,
        ])->assertSessionHasNoErrors();

        $this->travel(1)->minutes();

        postRoute(ROUTE_PASSWORD_EMAIL, [
            'email' => $user->email,
        ])->assertSessionHasNoErrors();
    });

it('send actual notification in user\'s email ', function () {
    $user = createUser();

    $this->expectsNotification($user, ResetPassword::class);

    post(route(ROUTE_PASSWORD_EMAIL), [
        'email' => $user->email,
    ]);
});
