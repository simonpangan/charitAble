<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Charity\CharityPosts;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityVolunteerPost;


class BenefactorHomeController
{
    public function index(): Response
    {
        Benefactor::auth()
            ->followingCharities()
            ->get(['name']);


        //Initial Algorithm
        /*
            'posts' => CharityPosts::all()
                        ->where(charity_followers::where('benefactor_id',auth->user-id()))
                        ->orderBy('created_at', 'DESC')
                        ->paginate(?)



                        
        */
        return Inertia::render('Benefactor/Home',[
            'user' => Auth::user()->withBenefactor()->toArray(),
            // 'posts' => CharityPosts::where('charity_id',52)->get()->toArray(),
            // 'volunteer_post'=> CharityVolunteerPost::where('charity_id',52)->get()->toArray()
        ]);
    }
}
