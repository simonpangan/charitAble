<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\Charity\Charity;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityOfficers;
use Inertia\Response as InertiaResponse;
use App\Http\Requests\Charity\CharityOfficerRequest;

class CharityOfficerController
{
    public function create(): Response
    {
        return Inertia::render('Charity/BoardMember/Create');
    }
    
    public function store(CharityOfficerRequest $request): RedirectResponse
    {
        CharityOfficers::create([
            'charity_id' => auth()->user()->id,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'officer_since' => $request['officer_since'],
            'position' => $request['position']
        ]);

        return to_route('charity.profile.index');
    }

    public function show(int $id): InertiaResponse
    {
        return Inertia::render(
            'Charity/BoardMember/Edit',
            ['officer' => CharityOfficers::find($id)]
        );
    }
    
    public function edit(CharityOfficerRequest $request): RedirectResponse
    {
        CharityOfficers::query()
            ->findOrFail($request->id)
            ->update($request->validated());

        return to_route('charity.profile.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityOfficers::query()
            ->findOrFail($id)
            ->delete();

        return to_route('charity.profile.index');
    }
}
