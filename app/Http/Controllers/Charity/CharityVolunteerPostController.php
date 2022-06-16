<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;
use App\Models\Charity\CharityVolunteerPost;
use App\Http\Requests\Charity\CharityVolunteerPostRequest;

class CharityVolunteerPostController
{
    public function store(CharityVolunteerPostRequest $request): RedirectResponse
    {
        CharityVolunteerPost::create($request->validated());

        return to_route('');
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
