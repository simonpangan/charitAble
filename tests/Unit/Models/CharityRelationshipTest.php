
<?php

use App\Models\User;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityDocuments;
use App\Models\Charity\CharityOfficers;


beforeEach(function () {
    $this->user = User::factory()->create([
        'id' => 10
    ]);

    $this->charity = $this->user->charity()->create(Charity::factory()->raw());
});


it('creates charity officer', function () {
    $this->charity->officers()->create([
        'name' => '::name::',
        'position' => '::position::',
        'officer_since' => now(),
    ]);
    
    $this->assertDatabaseCount('charity_officers', 1);

    $this->assertDatabaseHas('charity_officers', [
        'charity_id' => $this->user->id,
        'name' => '::name::',
        'position' => '::position::',
        'officer_since' => now(),
    ]);

    expect(CharityOfficers::latest()->first()->charity_id)->toBe(10);
});

it('creates charity document', function () {
    $this->charity->documents()->create([
        'path' => '::path::',
        'type' => '::type::',
    ]);
    
    $this->assertDatabaseCount('charity_documents', 1);

    $this->assertDatabaseHas('charity_documents', [
        'charity_id' => $this->user->id,
        'path' => '::path::',
        'type' => '::type::',
    ]);

    expect(CharityDocuments::latest()->first()->charity_id)->toBe(10);
});


// it('asd', function () {
//     $user = User::factory()->create([
//         'id' => 10
//     ]);

//     $charity = $user->charity()->create(Charity::factory()->raw());

//     $charity->officers()->create([
//         'name' => '::name::',
//         'main_content_body' => '::main_content_body::',
//         'main_content_body_image' => '::main_content_body_image::',
//     ]);
    
//     $this->assertDatabaseCount('charity_officers', 1);

//     $this->assertDatabaseHas('charity_officers', [
//         'charity_id' => $user->id,
//         'name' => '::name::',
//         'main_content_body' => '::main_content_body::',
//         'main_content_body_image' => '::main_content_body_image::'
//     ]);

//     expect(Charity::latest()->first()->id)->toBe(10);
// });
