<?php

use App\Models\Benefactor;
use App\Models\Log;
use App\Models\User;



it('user model can create logs', function () {
    $user = createUser();
    $user->createLog('Login to the application');

    $this->assertDatabaseCount('logs', 1);

    $this->assertDatabaseHas('logs', [
        'user_id' => $user->id,
        'activity' => 'Login to the application'
    ]);
});

it('retrieves logs for specific user', function () {
    User::factory()
        ->hasLogs(3)
        ->count(1)
        ->create();

    $userWithLogs = User::with('logs')->first();
 
    expect($userWithLogs->logs->pluck('user_id'))->each(function ($logUserId) use ($userWithLogs) {
        return $logUserId->toBe((string) $userWithLogs->id);
    });
    
    expect($userWithLogs->logs->count())->toEqual(3);
});


it('creates benefactor user', function () {
    $user = User::factory()->create([
        'id' => 10
    ]);

    $benefactor = Benefactor::factory()->raw();

    $user->benefactor()->create($benefactor);

    $this->assertDatabaseCount('benefactors', 1);

    $this->assertDatabaseHas('benefactors', [
        'id' => $user->id,
        'first_name' => $benefactor['first_name']
    ]);

    expect(Benefactor::latest()->first()->id)->toBe(10);
});
