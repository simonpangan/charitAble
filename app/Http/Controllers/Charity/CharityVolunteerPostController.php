<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use App\Models\VolunteerPostInterest;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityFollowers;
use Inertia\Response as InertiaResponse;
use App\Models\Charity\CharityVolunteerPost;
use App\Http\Requests\Charity\CharityVolunteerPostRequest;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

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

        $latestFiveActivePrograms = CharityProgram::query()
            ->where('charity_id' , $id)
            ->where('is_active', true)
            ->latest()
            ->limit(5)
            ->get();
            

        return Inertia::render('Charity/Volunteer-Posting/Index',[
            'volunteerPost'=> CharityVolunteerPost::where(
                    'charity_id', $id
                )->latest()->paginate(16),
            'charity' => $charity,
            'latestFiveActivePrograms' => $latestFiveActivePrograms,
            'can' => [
                'access' => Auth::id() ==  $charity->id,
                'seeFollowOrUnfollow' =>  $seeFollowOrUnfollow,
                'follow' => $canFollow 
            ]
        ]);
    }

    public function store(CharityVolunteerPostRequest $request): RedirectResponse
    {
        $values = array_merge(
            $request->validated(), 
            ['location' => ($request->is_face_to_face == true) ? $request->location : 'Virtual'] 
        );

        Auth::user()->createLog('You have created volunteer posting "'.$values['name'].'"');

        CharityVolunteerPost::create($values);

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
                'volunteerPost' => $post = CharityVolunteerPost::query()
                    ->with('charity:id,name', 'lastFiveInterest:id,first_name,last_name')
                    ->findOrFail($id),
                'can' => [
                    'modify' =>  $post->charity_id == Auth::id()
                ]
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

        $values = array_merge(
            $request->validated(), 
            ['location' => ($request->is_face_to_face == true) ? $request->location : 'Virtual'] 
        );

        Auth::user()->createLog('You have updated volunteer posting "'.$values['name'].'"');

        $program->update($values);

        return to_route('charity.volunteer.edit', $id)
            ->with('message', 'Succesfully updated your volunteer posting');
    }

    public function destroy(int $id): RedirectResponse
    {
        $volunteerPost = CharityVolunteerPost::findOrFail($id);
        
        abort_if($volunteerPost->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);
        
        VolunteerPostInterest::where('charity_volunteer_post_id', $id)->delete();
        
        Auth::user()->createLog('You have deleted volunteer posting "'.$volunteerPost->name.'"');
        
        $volunteerPost->delete();

        return to_route('charity.volunteer.index', Auth::id());
    }
}
