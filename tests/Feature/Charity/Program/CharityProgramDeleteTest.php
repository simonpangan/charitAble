<?php


use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Database\Eloquent\ModelNotFoundException;



//Unhappy path

it('throws model not found exception when the model does not exists', function () {
    $this->withoutExceptionHandling();
    deleteRoute('charity.program.destroy',  3);
})->throws(ModelNotFoundException::class);

//Happy Path

it('deletes a volunteer posting in the database', function () {
    $charityPost = createCharityProgram();

    $this->assertDatabaseCount('charity_programs', 1);

    deleteRoute(
        'charity.program.destroy', $charityPost->id
    );

    $this->assertDatabaseCount('charity_programs', 0);
});


it('redirects user after deleting post', function () {
    $charityPost = createCharityPost();
    
    $response = deleteRoute('charity.volunteer.destroy',  $charityPost->id);

    expect($response)->toBeRedirectedTo('index');
});

