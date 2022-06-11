<?php

use App\Http\Requests\Charity\CharityProgramRequest;
use App\Http\Controllers\Charity\CharityProgramController;


it('should use BenefactorRegisterRequest class', function () {
    $this->assertActionUsesFormRequest(
        CharityProgramController::class,
        'store',
        CharityProgramRequest::class
    );

    $this->assertActionUsesFormRequest(
        CharityProgramController::class,
        'update',
        CharityProgramRequest::class
    );
});

it('should have exact validation', function () {
    $request = new CharityProgramRequest();

    $this->assertExactValidationRules([
        'description' => ['required', 'string'],
    ], $request->rules());
});