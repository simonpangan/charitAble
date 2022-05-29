<?php

use App\Models\User;
use function Pest\Laravel\get;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use App\Notifications\CustomVerifyEmail;
use \Symfony\Component\HttpFoundation\Response;
use Inertia\Testing\AssertableInertia as Assert;


const ROUTE_VERIFICATION_NOTICE  = 'auth.verification.notice';

//Route Test

it('shows the email verification notice page')
    ->createAuthUnverifiedUser()
    ->getRoute(ROUTE_VERIFICATION_NOTICE)
    ->assertOk();

//Component Test

it('renders the correct component')
    ->createAuthUnverifiedUser()
    ->getRoute(ROUTE_VERIFICATION_NOTICE)
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/Email')
    );


//Unhappy Path

it('throws an error if invalid signature', function () {
    createAuthUnverifiedUser();

    $this->withoutExceptionHandling();
    $this->expectException(Illuminate\Routing\Exceptions\InvalidSignatureException::class);

    get('http://127.0.0.1:8000/email/verify/1/adasd');
});

it('redirects back the user if input is invalid', function () {
    createAuthUnverifiedUser();

    $this->from(route(ROUTE_VERIFICATION_NOTICE))
        ->post(route('auth.verification.send'))
        ->assertRedirect(route(ROUTE_VERIFICATION_NOTICE));
});

it('throws an error if user send request multiple times under a minute')
    ->tap(function () {
        createAuthUnverifiedUser();

        postRoute('auth.verification.send');
        for ($attempt = 1; $attempt < 6; $attempt++) {
            postRoute('auth.verification.send')
                ->assertStatus(Response::HTTP_FOUND);
        }

        postRoute('auth.verification.send')
            ->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
    });

it('redirects verified user when attempted to go to verification notice page')
    ->expectAuthVerifiedUser()
    ->toBeRedirectedForRoute(route: 'auth.verification.send', method: 'post');

it('redirects verified user when its own designated route when attempted to go to verification notice page')
  ->tap(function () {
      createAuthUser();

      getRoute('auth.verification.notice')
          ->assertRedirect($this->redirectTo());
  });

it('redirects verified user when its own designated route when attempted to send email verification requests')
    ->tap(function () {
        createAuthUser();

        postRoute('auth.verification.send')
            ->assertRedirect($this->redirectTo());
    });


//Happy Path

it('sends email verification notice when requested')
    ->tap(function () {
        Notification::fake();

        $user = createAuthUnverifiedUser();

        postRoute('auth.verification.send');

        Notification::assertSentTo(
            User::latest()->first(), CustomVerifyEmail::class
        );
    });

it('sends email verification notice after registration')
    ->tap(function () {
        Notification::fake();

        $user = User::factory()->unverified()->makeOne([
            'password' => 'Oklahoma#12',
            'password_confirmation' => 'Oklahoma#12'
        ]);

        postRoute('register.store', $user->getAttributes())
            ->assertSessionHasNoErrors();

        //https://github.com/laravel/framework/issues/17778
        Notification::assertSentTo(
            User::latest()->first(),
            CustomVerifyEmail::class
        );
    });

it('verifies user', function () {
    $user = createUnverifiedUser();

    actingAs($user);

    $this->assertNull($user->email_verified_at);

    $url =  URL::temporarySignedRoute(
        'auth.verification.verify',
        Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        [
            'id' => $user->getKey(),
            'hash' => sha1($user->getEmailForVerification()),
        ]
    );

    $this->get($url);

    $this->assertNotNull(User::latest()->first()->email_verified_at);
});





