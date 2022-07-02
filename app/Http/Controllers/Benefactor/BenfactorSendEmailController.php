<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Mail\VolunteerJoinMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityVolunteerPost;

class BenfactorSendEmailController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email|string',
            'message' => 'required|max:255|string', 
        ]);

        $post = CharityVolunteerPost::query()
            ->with(['charity:id,name', 'charity.user'])
            ->find($request->id, ['id', 'charity_id','name']); 

        $user = User::with('benefactor')->find(Auth::id());


        \Mail::to($post->charity->user->email)
            ->send(new VolunteerJoinMail($post, $user, $request->only('email','message')));

        to_route('charity.volunteer.show', 163)
            ->with('message', 'Succesfully send your email');
    }
}
