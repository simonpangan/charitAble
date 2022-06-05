<?php

use App\Rules\MaxWordsRule;


beforeEach(function () {
    $this->rules = [
        'firstname' => new MaxWordsRule(50), 
    ];
});

test('max word rule accept up to 50 words', function () {
    $data = [
        'firstname' => str_repeat("::firstname:: ", 50),
    ];
    
    $validator = $this->app['validator']->make($data, $this->rules);

    expect($validator->passes())->toBeTrue();
});

test('max word rule does not accept more than 51 words', function () {
    $data = [
        'firstname' => str_repeat("::firstname:: ", 51),
    ];
    
    $validator = $this->app['validator']->make($data, $this->rules);

    expect($validator->passes())->toBeFalse();
});
