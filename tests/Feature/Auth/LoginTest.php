 <?php


use App\Models\Log;
use App\Models\User;
use function Pest\Laravel\post;
use \Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\AssertableInertia as Assert;


const ROUTE_LOGIN_POST  = 'auth.login';

//Route Test
// /login - auth.index
// ~/login test
it('shows the login page')
    ->getRoute('auth.index')
    ->assertOk();

//Component Test
it('renders the correct component')
    ->getRoute('auth.index')
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/Login')
    );


//Unhappy Path Test

test('validation test', function (Collection $payload, Collection $key) {
    postRoute('auth.login', $payload->toArray())
        ->assertSessionHasErrors($key->toArray());
})->with(function () {
    $defaultPayload = collect([
        'email' => 'valid@yahoo.com',
        'password' => '::password::',
    ]);

    yield from [
        'missing email & password' => [
            'payload' => $defaultPayload->except(['email', 'password']),
            'key' => $defaultPayload->map(function ($value, $key) {
                return "The {$key} field is required.";
            })
        ],
        'email & password must be string' => [
            'payload' => $defaultPayload->merge(['email' => 12345, 'password' => 12345]),
            'key' => $defaultPayload->map(function ($value, $key) {
                return "The {$key} must be a string.";
            })
        ],
    ];
});

it('redirects back the user if input is invalid', function () {
    $this->from(route('auth.index'))
        ->post(route('auth.login'))
        ->assertRedirect(route('auth.index'));
});

it('shows error when tries to login 6 times per minute')
    ->tap(function () {
        for ($attempt = 1; $attempt <= 5; $attempt++) {
            postRoute('auth.login', [
                'email' => 'someemail@yahoo.com',
                'password' => '::password::'
            ]);
        }
        
        //Attempt 6
        $response = postRoute('auth.login', [
            'email' => 'someemail@yahoo.com',
            'password' => '::password::'
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Too many login attempts. Please try again in 60 seconds.'
        ]); 
    });


//Happy Path Test

it('logs the user in')
    ->tap(function () {
        $user = User::factory()->create([
            'password' => Hash::make('::password::')
        ]);

        post('/login', [
            'email' => $user->email,
            'password' => '::password::'
        ]);
    })
    ->assertAuthenticated();

it('creates activity log after login in to the system', function() {
    $user = User::factory()->create([
        'password' => Hash::make('::password::')
    ]);

    post('/login', [
        'email' => $user->email,
        'password' => '::password::'
    ]);

    $this->assertDatabaseHas('logs', [
        'user_id' => $user->id,
        'activity' => 'You have login into our application'
    ]);

    $this->assertDatabaseCount('logs', 1);
});

it('redirects to correct route when the verified user logs in')
    ->tap(function () {
        $user = User::factory()->create([
            'password' => Hash::make('::password::')
        ]);

        post('/login', [
            'email' => $user->email,
            'password' => '::password::'
        ])->assertRedirect($this->redirectTo());
    });


//Manual Test

it('requires user to login again after 1 min', function () {
    // Working
})->skip();
    
it('destroy session when the user close the browser', function () {
    // Working
})->skip();

it('automatically login user if the user has chosen to be remembered and the sesion expires', function () {
    // Working  
})->skip();
