<?php

use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityVolunteerPost;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Database\Eloquent\ModelNotFoundException;


//Unhappy path

it('throws model not found exception when the model does not exists for show page', 
    function () {
        $this->withoutExceptionHandling();
        getRoute('charity.program.show',  3);
})->throws(ModelNotFoundException::class);

it('throws model not found exception when the model does not exists for edit page', 
    function () {
        $this->withoutExceptionHandling();
        getRoute('charity.program.edit', 3);
})->throws(ModelNotFoundException::class);

//Happy 

it('shows specific charity program', function () {
    $charityProgram = createCharityProgram();

    $this->assertDatabaseCount('charity_programs', 1);
    $this->assertDatabaseHas(
        'charity_programs',  
        Arr::except($charityProgram->toArray(), ['created_at', 'updated_at'])
    );

    $response = getRoute(
        'charity.program.show', $charityProgram->id
    );

    $response->assertInertia(fn (Assert $page) => $page
        // ->component('Auth/Password/Reset')
        ->where('id', $charityProgram->id)
        ->where('charity_id', $charityProgram->charity_id)
        ->where('description', $charityProgram->description)
    );

    $response = getRoute(
        'charity.program.edit', $charityProgram->id
    );

    $response->assertInertia(fn (Assert $page) => $page
        // ->component('Auth/Password/Reset')
        ->where('id', $charityProgram->id)
        ->where('charity_id', $charityProgram->charity_id)
        ->where('description', $charityProgram->description)
    );
});

it('updates specific charity program', function () {
    $charityProgram = createCharityProgram();

    $this->assertDatabaseCount('charity_programs', 1);
    $this->assertDatabaseHas(
        'charity_programs',  
        Arr::except($charityProgram->toArray(), ['created_at', 'updated_at'])
    );

    $updatedCharityProgram = CharityProgram::factory()->raw();

    putRoute(
        'charity.program.update', 
        $updatedCharityProgram,
        $charityProgram->id
    );
    
    $this->assertDatabaseCount('charity_programs', 1);
    $this->assertDatabaseHas('charity_programs', $updatedCharityProgram);
});