<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityVolunteerPost;
use App\Http\Requests\Charity\CharityVolunteerPostRequest;
use Inertia\Response as InertiaResponse;
use Inertia\Response;

class CharityVolunteerPostController
{
    public function store(CharityVolunteerPostRequest $request): RedirectResponse
    {
        CharityVolunteerPost::create([
            'charity_id' => auth()->user()->id,
            'volunteer_work_name' => $request['volunteer_work_name'],
            'description' => 'asdsa',
            'location' => $request['location'],
            'incentives' => $request['volunteer_incentives'],
            
        ]);

        return to_route('charity.profile.index');
    }
    public function create(): Response
    {
        return Inertia::render('Charity/Volunteer-Posting/Create',[
            'csrfToken' => csrf_token()
        ]);
    }
    public function show(int $id): InertiaResponse
    {
        return Inertia::render(
            '',
            CharityVolunteerPost::findOrFail($id)->toArray()
        );
    }
    public function edit(int $id): InertiaResponse
    {
        return Inertia::render(
            '',
            CharityVolunteerPost::findOrFail($id)->toArray()
        );
    }

    public function update(CharityVolunteerPostRequest $request, int $id): RedirectResponse
    {
        CharityVolunteerPost::query()
            ->findOrFail($id)
            ->update($request->validated());

        return to_route('');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityVolunteerPost::query()
            ->findOrFail($id)
            ->delete();

        return to_route('index');
    }
}
