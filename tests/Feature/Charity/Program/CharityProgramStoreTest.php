<?php

use App\Models\Charity\CharityProgram;




//Unhappy path
it('returns error for blank inputs', function () {  
    $response = postRoute(
        'charity.program.store'
    )
    ->assertSessionHasErrors();
});


//Happy Path

it('creates new volunteer post to the database', function () {
    createAuthCharityUser();

    $charityPost = CharityProgram::factory()->raw();
    
    postRoute('charity.program.store', $charityPost)
        ->assertSessionHasNoErrors();

    $this->assertDatabaseHas('charity_programs', $charityPost);
    $this->assertDatabaseCount('charity_programs', 1);
});