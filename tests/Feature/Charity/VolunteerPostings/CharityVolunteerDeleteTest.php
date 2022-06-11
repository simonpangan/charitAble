<?php


use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Database\Eloquent\ModelNotFoundException;


beforeEach(function () {
    withoutMiddleware();
});


//Unhappy path

it('throws model not found exception when the model does not exists', function () {
    $this->withoutExceptionHandling();
    deleteRoute('charity.volunteer.destroy',  3);
})->throws(ModelNotFoundException::class);

//Happy Path

it('deletes a volunteer posting in the database', function () {
    createAuthCharityUser();

    $charityPost = CharityVolunteerPost::factory()->createOne();

    $this->assertDatabaseCount('charity_volunteer_posts', 1);

    deleteRoute(
        'charity.volunteer.destroy', $charityPost->id
    );

    $this->assertDatabaseCount('charity_volunteer_posts', 0);
});