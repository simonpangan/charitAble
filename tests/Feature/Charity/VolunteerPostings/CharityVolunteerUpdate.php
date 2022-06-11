<?php

use App\Models\Charity\CharityVolunteerPost;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Database\Eloquent\ModelNotFoundException;


//Unhappy path

it('throws model not found exception when the model does not exists for show page', 
    function () {
        $this->withoutExceptionHandling();
        getRoute('charity.volunteer.show',  3);
})->throws(ModelNotFoundException::class);

it('throws model not found exception when the model does not exists for edit page', 
    function () {
        $this->withoutExceptionHandling();
        getRoute('charity.volunteer.edit', 3);
})->throws(ModelNotFoundException::class);

//Happy 

it('shows specific volunteer posting', function () {
    createAuthCharityUser();

    $charityPost = CharityVolunteerPost::factory()->createOne();

    $this->assertDatabaseCount('charity_volunteer_posts', 1);
    $this->assertDatabaseHas(
        'charity_volunteer_posts',  Arr::except($charityPost->toArray(), ['created_at', 'updated_at'])
    );

    $response = getRoute(
        'charity.volunteer.show', $charityPost->id
    );

    $response->assertInertia(fn (Assert $page) => $page
        // ->component('Auth/Password/Reset')
        ->where('id', $charityPost->id)
        ->where('charity_id', $charityPost->charity_id)
        ->where('description', $charityPost->description)
        ->where('location', $charityPost->location)
    );

    $response = getRoute(
        'charity.volunteer.edit', $charityPost->id
    );

    $response->assertInertia(fn (Assert $page) => $page
        // ->component('Auth/Password/Reset')
        ->where('id', $charityPost->id)
        ->where('charity_id', $charityPost->charity_id)
        ->where('description', $charityPost->description)
        ->where('location', $charityPost->location)
    );
});

it('updates specific volunteer posting', function () {
    createAuthCharityUser();

    $charityPost = CharityVolunteerPost::factory()->createOne();

    $this->assertDatabaseCount('charity_volunteer_posts', 1);
    $this->assertDatabaseHas(
        'charity_volunteer_posts',  Arr::except($charityPost->toArray(), ['created_at', 'updated_at'])
    );

    $updatedCharityPost = CharityVolunteerPost::factory()->raw();

    putRoute(
        'charity.volunteer.update', 
        $updatedCharityPost,
        $charityPost->id
    );
    
    $this->assertDatabaseCount('charity_volunteer_posts', 1);
    $this->assertDatabaseHas('charity_volunteer_posts', $updatedCharityPost);
});