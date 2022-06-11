<?php


use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityVolunteerPost;


beforeEach(function () {
    withoutMiddleware();
});


//Unhappy path
it('returns error for blank inputs', function () {  
    $response = postRoute(
        'charity.volunteer.store'
    )
    ->assertSessionHasErrors();
});


//Happy Path

it('creates new volunteer post to the database', function () {
    createAuthCharityUser();

    $charityPost = CharityVolunteerPost::factory()->makeOne()->toArray();

    postRoute('charity.volunteer.store', $charityPost);

    $this->assertDatabaseHas('charity_volunteer_posts', $charityPost);
    $this->assertDatabaseCount('charity_volunteer_posts', 1);
});