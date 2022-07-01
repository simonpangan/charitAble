<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityFollowers;
use Inertia\Response as InertiaResponse;
use App\Models\Charity\CharityVolunteerPost;
use App\Http\Requests\Charity\CharityVolunteerPostRequest;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class CharityVolunteerPostController
{
    public function index(int $id): Response
    {
        $charity = Charity::query()
            ->findOrFail($id);

        $seeFollowOrUnfollow = false;
        $canFollow = false;

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR']) {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }
            

        return Inertia::render('Charity/Volunteer-Posting/Index',[
            'volunteerPost'=> CharityVolunteerPost::where(
                    'charity_id', $id
                )->latest()->get(),
            'charity' => $charity,
            'can' => [
                'access' => Auth::id() ==  $charity->id,
                'seeFollowOrUnfollow' =>  $seeFollowOrUnfollow,
                'follow' => $canFollow 
            ]
        ]);
    }

    public function store(CharityVolunteerPostRequest $request): RedirectResponse
    {
        CharityVolunteerPost::create($request->validated());

        return to_route('charity.volunteer.index', Auth::id());
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Volunteer-Posting/Create');
    }

    public function show(int $id): InertiaResponse
    {
        return Inertia::render(
            'Charity/Volunteer-Posting/Show', [
                'volunteerPost' => CharityVolunteerPost::query()
                    ->with('charity:id,name')
                    ->findOrFail($id),
            ]
        );
    }
    public function edit(int $id): InertiaResponse
    {
        $post = CharityVolunteerPost::findOrFail($id);

        abort_if($post->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        return Inertia::render(
                'Charity/Volunteer-Posting/Edit',
                ['volunteerPost' => $post]
            );
    }

    public function update(CharityVolunteerPostRequest $request, int $id): RedirectResponse
    {
        $program = CharityVolunteerPost::findOrFail($id);
        
        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        $program->update($request->validated());

        return to_route('charity.volunteer.edit', $id)
            ->with('message', 'Succesfully updated your volunteer posting');
    }

    public function destroy(int $id): RedirectResponse
    {
        $volunteerPost = CharityVolunteerPost::findOrFail($id);
        
        abort_if($volunteerPost->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        $volunteerPost->delete();

        return to_route('charity.volunteer.index', Auth::id());
    }
}
