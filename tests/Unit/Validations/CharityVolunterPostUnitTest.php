<?php

use App\Http\Requests\Charity\CharityVolunteerPostRequest;
use App\Http\Controllers\Charity\CharityVolunteerPostController;



it('should use BenefactorRegisterRequest class', function () {
    $this->assertActionUsesFormRequest(
        CharityVolunteerPostController::class,
        'store',
        CharityVolunteerPostRequest::class
    );

    $this->assertActionUsesFormRequest(
        CharityVolunteerPostController::class,
        'update',
        CharityVolunteerPostRequest::class
    );
});

it('should have exact validation', function () {
    $request = new CharityVolunteerPostRequest();

    $this->assertExactValidationRules([
        'description' => ['required', 'string'],
        'location' => ['required', 'string'],
    ], $request->rules());
});
