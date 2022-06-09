<?php

use App\Models\User;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use Illuminate\Database\Eloquent\ModelNotFoundException;

beforeEach(function () {
    withoutMiddleware();  
    
    $this->charity = User::factory()->create()
        ->charity()
        ->save(
            Charity::factory()->makeOne()
        );

    $this->charityPost = $this->charity->posts()
        ->saveQuietly(
            CharityPosts::factory()->makeOne()
        );
});


//unhappy path delete
it('throws model not found exception when the model does not exists', function () {
    $this->withoutExceptionHandling();
    deleteRoute('charity.posts.destroy',  3);
})->throws(ModelNotFoundException::class);


//happy path delete
it('deletes charity post', function () {
    deleteRoute('charity.posts.destroy',  $this->charityPost->id);

    expect(CharityPosts::all()->toArray())->toBeEmpty();
});

it('redirects user after deleting post', function () {
    $response = deleteRoute('charity.posts.destroy',  $this->charityPost->id);

    expect($response)->toBeRedirectedTo('charity.posts.index');
});