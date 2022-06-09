<?php

use App\Models\Charity\CharityPosts;
use Inertia\Testing\AssertableInertia as Assert;


beforeEach(function () {
    $this->withoutMiddleware();
});


it('shows the charity create page')  
    ->getRoute('charity.posts.create')
    ->assertOk();

it('renders the correct asd component')
    ->getRoute('charity.posts.create')
    ->assertInertia(fn (Assert $page) => $page
        ->component('Charity/Post/Create')
    );
