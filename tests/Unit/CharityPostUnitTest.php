<?php


use App\Http\Requests\CharityPostStoreRequest;
use App\Http\Controllers\Charity\CharityPostsController;


it('should use BenefactorRegisterRequest class', function () {
    $this->assertActionUsesFormRequest(
        CharityPostsController::class,
        'store',
        CharityPostStoreRequest::class
    );
});

it('should have exact validation', function () {
    $request = new CharityPostStoreRequest();

    $this->assertExactValidationRules([
        'main_content_body' => ['required', 'string', 'min:2'],
        'main_content_body_image' => ['required', 'string', 'min:2'],
    ], $request->rules());
});