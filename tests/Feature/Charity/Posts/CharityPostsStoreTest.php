<?php

use App\Models\Benefactor;
use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    withoutMiddleware();
});



//happy path
it('redirects user after creating post', function () {
    createCharityUser();

    $response = postRoute(
        'charity.posts.store', CharityPosts::factory()->raw()
    );

    expect($response)->toBeRedirectedTo('charity.posts.index');
});



it('creates new post to the database', function () {
    createCharityUser();

    $charityPost = CharityPosts::factory()->makeOne();

    postRoute('charity.posts.store', $charityPost->toArray());

    $this->assertDatabaseHas('charity_posts', [
        'main_content_body' => $charityPost->main_content_body,
        'main_content_body_image' => $charityPost->main_content_body_image,
    ]);

    $this->assertDatabaseHas('charity_posts', [
        'main_content_body' => $charityPost->main_content_body,
        'main_content_body_image' => $charityPost->main_content_body_image,
    ]);
    $this->assertDatabaseCount('charity_posts', 1);
});