<?php

use App\Rules\MaxWordsRule;
use App\Enums\CharityCategory;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\BenefactorRegisterRequest;
use App\Http\Controllers\Auth\Register\BenefactorRegisterController;


it('should use BenefactorRegisterRequest class', function () {
    $this->assertActionUsesFormRequest(
        BenefactorRegisterController::class,
        'store',
        BenefactorRegisterRequest::class
    );
});

it('should have exact validation', function (int $step, $rules) {
    $request = new BenefactorRegisterRequest(query: [
        'step' => $step
    ]);

    $this->assertExactValidationRules($rules, $request->rules());
})->with(function () {
    $stepOneRules = [
        'first_name' => ['required', 'string', 'min:2', new MaxWordsRule(50)],
        'last_name' => ['required', 'string', 'min:2', new MaxWordsRule(2)],
        'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'confirmed', 
            Password::min(8)->letters()->mixedCase()->numbers()->symbols()
        ],
    ];

    $stepTwoRules = array_merge($stepOneRules, [
        'age' => ['required', 'numeric', 'min:18', 'max:100'],
        'gender' => ['required', 'string', Rule::in(['Male', 'Female', 'LGBT', 'Others'])],
        'city' => ['required', 'string'],
        'account_type' => ['required', 'string', Rule::in(['Personal', 'Business'])],
    ]);

    $stepThreeRules = array_merge($stepTwoRules, [
        'preferences' => [
            'array', 'required', 
        ],
        'preferences.*' => [
            'required', 'distinct', Rule::in(CharityCategory::getCategoriesName())
        ],
    ]);


    return  [
        'step 1' => [
            'step' => 1,
            'rules' => $stepOneRules
        ], 
        'step 2' => [
            'step' => 2,
            'rules' => $stepTwoRules
        ],
        'step 3' => [
            'step' => 3,
            'rules' => $stepThreeRules
        ]
    ];
});

