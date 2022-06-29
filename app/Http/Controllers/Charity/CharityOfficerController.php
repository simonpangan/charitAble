<?php

namespace App\Http\Controllers\Charity;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityOfficers;
use App\Models\Charity\Charity;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\Response as InertiaResponse;

class CharityOfficerController
{
    public function create(): Response
    {
        return Inertia::render('Charity/BoardMember/Create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $id = auth()->user()->id;

        CharityOfficers::create([
            'charity_id' => $id,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'officer_since' => $request['officer_since'],
            'position' => $request['position']
        ]);

        return to_route('charity.profile.index');
    }
    
    public function edit(int $id): InertiaResponse
    {
        $id = auth()->user()->id;

        return Inertia::render(
            'Charity/BoardMember/Edit',
            [
                'charity' => Charity::where('id',$id)->get()->toArray(),
                'officer' => CharityOfficers::where('charity_id',$id)->get()->toArray(),
            ]);

    }
    
    // public function edit(int $id): InertiaResponse
    // {
    //     return Inertia::render(
    //         '',
    //         CharityVolunteerPost::findOrFail($id)->toArray()
    //     );
    // }

    // public function update(CharityVolunteerPostRequest $request, int $id): RedirectResponse
    // {
    //     CharityVolunteerPost::query()
    //         ->findOrFail($id)
    //         ->update($request->validated());

    //     return to_route('');
    // }

    // public function destroy(int $id): RedirectResponse
    // {
    //     CharityVolunteerPost::query()
    //         ->findOrFail($id)
    //         ->delete();

    //     return to_route('index');
    // }
}
