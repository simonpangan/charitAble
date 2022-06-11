<?php

namespace App\Http\Controllers\Charity;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityVolunteerPost;
use App\Http\Requests\CharityVolunteerPostRequest;

class CharityVolunteerPostController
{
    public function store(CharityVolunteerPostRequest $request): RedirectResponse
    {
        CharityVolunteerPost::create($request->validated());

        return to_route('');
    }

    public function destroy($id): RedirectResponse
    {
        CharityVolunteerPost::query()
            ->findOrFail($id)
            ->delete();
            
        return to_route('');
    }
}
