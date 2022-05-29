<?php


use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Auth\RegisterController;


it('should have the exact validation rules', function () {
    $register = new RegisterController();

    $this->assertValidationRules([
        'firstName' => ['required', 'string', 'max:55'],
        'lastName' => ['required', 'string', 'max:55'],
        'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'confirmed', Password::defaults()],
    ], $register->rules());
});
