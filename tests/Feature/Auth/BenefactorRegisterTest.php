<?php

use App\Models\User;
use Mockery\MockInterface;
use Illuminate\Support\Str;
use function Pest\Laravel\post;
use App\Http\Requests\BenefactorRegisterRequest;
use Inertia\Testing\AssertableInertia as Assert;

//Route Test

it('shows the charity registration page')
    ->getRoute('register.benefactor.index')
    ->assertOk();

//Component Test

it('renders the correct component')
    ->getRoute('register.benefactor.index')
    ->assertInertia(fn (Assert $page) => $page
        ->component('Auth/BenefactorRegister')
    );


//unhappy path testing

it('redirects back the user if input is invalid', function () {
    $this->from(route('register.benefactor.index'))
        ->post(route('register.benefactor.store'))
        ->assertRedirect(route('register.benefactor.index'));
});

it('throws specific field validations for every step', 
    function (int $step, array $fields) {

    $this->post(route('register.benefactor.store', [
        'step' => $step
    ]))
    ->assertSessionHasErrors($fields);
})
->with(function () {
    $defaultFields = collect(
        ['first_name', 'last_name', 'email', 'password']
    );

    yield from [
        'step 1' => [
            'step' => 1,
            'fields' => $defaultFields->toArray()
        ],
        'step 2' => [
            'step' => 2,
            'fields' => $defaultFields->push('age', 'gender', 'city', 'account_type')->toArray()
        ],
        'step 3' => [
            'step' => 3,
            'fields' => $defaultFields->push('preferences')->toArray()
        ],
    ];
});

test('invalid email format', function (String|int $email) {
    postRoute('register.benefactor.store', [
        'email' => $email
    ])
    ->assertSessionHasErrors(['email' => "The email must be a valid email address."]);
})
->with([
    123456, 'email', 'email@',
    'email@.com', '@.com',
    'contact”@[192.168.0.1]',
    'harry@gmail.con'
]);

it('has error if email exists', function () {
    $user = User::factory()->create();

    postRoute('register.benefactor.store', [
        'email' => $user->email,
    ])
    ->assertSessionHasErrors(
        ['email' => "The email has already been taken."]
    );
});

it('has errors if password confirmation does not exist', function () {
    postRoute('register.benefactor.store', [
        'password' => 'Oklahoma#12',
    ])
    ->assertSessionHasErrors([
        'password' => 'The password confirmation does not match.',
    ]);
});

it('has errors for fields that does not match the correct data', function (string $field, string $value) {
    //When field contains an underscore replace it with space 
    $validationName = Str::of($field)
        ->when(strpbrk($field, '_'), function ($string) {
            return $string->replace('_', ' ');
        });

    postRoute('register.benefactor.store', [
            $field => $value
        ])
        ->assertSessionHasErrors(
            [$field => "The selected {$validationName} is invalid."]
        );
})->with([
    ['account_type', '::account type::'],
    ['gender', '::gender::'],
]);

it('has errors for array fields that does not match the correct set of data ', 
function (string $field, array $value) {
    postRoute('register.benefactor.store', [
        $field => $value
    ])  
    ->assertSessionHasErrors(
        ["preferences.0" => "The selected preferences.0 is invalid."]
    );
})->with([
    ['preferences', ['::preferences::']],
]);

it('has errors for fields that does not satisfy the length', 
    function (array $field, array $error) {
    postRoute('register.benefactor.store', $field)
        ->assertSessionHasErrors($error);
})->with(function () {
    yield from [
        'fields with maximum number of words' => [
            'field' => [
                'first_name' => str_repeat("::firstname:: ", 51),
                'last_name' => str_repeat("::firstname:: ", 3)
            ],
            'error' => [
                'first_name' => 'The first name cannot be longer than 50 words.',
                'last_name' => 'The last name cannot be longer than 2 words.',
            ]
        ],
        'fields with maximum number of characters' => [
            'field' => ['email' => str_repeat('a', 250).'@yahoo.com'],
            'error' => ['email' => 'The email must not be greater than 255 characters.']
        ],
        'fields with minimum number of character' => [
            'field' => [
                'first_name' => 'a', 'last_name' => 'a'
            ],
            'error' => [
                'first_name' => 'The first name must be at least 2 characters.',
                'last_name' => 'The last name must be at least 2 characters.',
            ]
        ],
        'fields with maximum numeric value' => [
            'field' => ['age' => 101],
            'error' => [
                'age' => 'The age must not be greater than 100.',
            ]
        ],
        'fields with minimum numeric value' => [
            'field' => ['age' => 17],
            'error' => [
                'age' => 'The age must be at least 18.',
            ]
        ],
    ];
});

it('throws error for wrong password format', function (array $fields, array $errors) {
    postRoute('register.benefactor.store', $fields)
        ->assertSessionHasErrors($errors);
})->with(function () {
    yield from [
        'password and confirmed password does not match' => [
            'field' => [
                'password' => '::',
                'password_confirmation' => ':',
            ],
            'error' => ['password' => 'The password confirmation does not match.']
        ],
        'password is less than 8 characters' => [
            'field' => [
                'password' => '::',
                'password_confirmation' => '::',
            ],
            'error' => ['password' => 'The password must be at least 8 characters.']
        ],
        'password must have 1 uppercase and 1 lowercase letter' => [
            'field' => [
                'password' => str_repeat('1', 8),
                'password_confirmation' => str_repeat('1', 8),
            ],
            'error' => [
                'password' => 'The password must contain at least one uppercase and one lowercase letter.'
            ]
        ],
        'password must have 1 number' => [
            'field' => [
                'password' => str_repeat('Aa', 8),
                'password_confirmation' => str_repeat('Aa', 8),
            ],
            'error' => ['password' => 'The password must contain at least one number.']
        ],
        'password must have 1 symbol' => [
            'field' => [
                'password' => str_repeat('Aa1', 8),
                'password_confirmation' => str_repeat('Aa', 8),
            ],
            'error' => ['password' => 'The password must contain at least one symbol.']
        ],
    ];
});


//happy path test
it('registers the user')
    ->tap(function () {
        postRoute('register.benefactor.store', [
            'first_name' => '::firstname::',
            'last_name' => '::lastname::',
            'email' => 'simonpangan@yahoo.com',
            'password' => 'Oklahoma#12',
            'password_confirmation' => 'Oklahoma#12',
            'age' => 18,
            'gender' => 'Male',
            'account_type' => 'Personal',
            'city' => '::city::',
            'preferences' => [
                'AGRICULTURE'
            ],
        ]);
    })
    ->assertDatabaseCount('users', 1)
    ->assertDatabaseHas('users', [
        'email' => 'simonpangan@yahoo.com',
        'role_id' => 4,
        'email_verified_at' => null
    ])
    ->assertDatabaseHas('benefactors', [
        'first_name' => '::firstname::',
        'last_name' => '::lastname::',
        'age' => 18,
        'gender' => 'Male',
        'account_type' => 'Personal',
        'city' => '::city::',
        'preferences' => 'AGRICULTURE'
    ]);

it('logs in the user', function () {
    postRoute('register.benefactor.store', [
        'first_name' => '::firstname::',
        'last_name' => '::lastname::',
        'email' => 'simonpangan@yahoo.com',
        'password' => 'Oklahoma#12',
        'password_confirmation' => 'Oklahoma#12',
        'age' => 18,
        'gender' => 'Male',
        'account_type' => 'Personal',
        'city' => '::city::',
        'preferences' => [
            'AGRICULTURE'
        ],
    ]);

    $this->assertAuthenticated();
});
