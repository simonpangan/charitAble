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
        CharityVolunteerPost::create([
            'charity_id' => auth()->user()->id,
            'name' => $request['volunteer_work_name'],
            'qualifications' => $request['volunteer_qualifications'],
            'description' => 'asdsa',
            'location' => $request['location'],
            'incentives' => $request['volunteer_incentives'],
            'status' => '1'
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
        $charity_id = CharityVolunteerPost::findOrFail($id)->charity_id;

        return Inertia::render(
            'Charity/Volunteer-Posting/VolunteerPost',
            [
                'volunteer_post' => CharityVolunteerPost::findOrFail($id)->toArray(),
                'charity' => Charity::where('id',$charity_id)->get()->toArray(),
            ]);
    }
    public function edit(int $id): InertiaResponse
    {
        $charity_id = CharityVolunteerPost::findOrFail($id)->charity_id;
        return Inertia::render(
            'Charity/Volunteer-Posting/Edit',
            [
                'volunteer_post' => CharityVolunteerPost::findOrFail($id)->toArray(),
                'charity' => Charity::where('id',$charity_id)->get()->toArray(),
            ]);

    }

    public function update(CharityVolunteerPostRequest $request, int $id): RedirectResponse
    {
        CharityVolunteerPost::query()
            ->findOrFail($id)
            ->update(
                ['charity_id' => auth()->user()->id,
                 'name' => $request['name'],
                  'qualifications' => $request['volunteer_qualifications'],
                  'description' => $request['volunteer_description'],
                  'location' => $request['location'],
                  'incentives' => $request['volunteer_incentives'],
                  ['status' => '1']]);


        return to_route('charity.volunteer.edit', $id)
        ->with('message', 'Succesfully updated your profile');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityVolunteerPost::query()
            ->findOrFail($id)
            ->delete();

        return to_route('index');
    }
}
