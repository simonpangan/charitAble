
<?php

use App\Models\User;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityOfficers;

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

it('creates charity user', function () {
    $user = User::factory()->create([
        'id' => 10
    ]);

    $user->charity()->create([
        'name' => 'Accenture'
    ]);

    $this->assertDatabaseCount('charities', 1);

    $this->assertDatabaseHas('charities', [
        'id' => $user->id,
        'name' => 'Accenture'
    ]);

    expect(Charity::latest()->first()->id)->toBe(10);
});

