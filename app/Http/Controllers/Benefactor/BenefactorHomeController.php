<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Charity\CharityFollowers;
use App\Models\Charity\CharityPosts;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Contracts\Pagination\CursorPaginator;


class BenefactorHomeController
{
    public function index()
    {
        return Inertia::render('Benefactor/Home',[
            'user' => Auth::user()->withBenefactor()->toArray(),
            'posts' => $this->getCharityPostsByFollowing()
            // 'volunteer_post'=> CharityVolunteerPost::where('charity_id',52)->get()->toArray()
        ]);
    }

    private function getCharityPostsByFollowing(): CursorPaginator
    {
        return CharityPosts::query()
            ->select('charities.name as charity_name', 'charities.logo as charity_logo', 'charity_posts.*')
            ->join('charities', 'charities.id', '=', 'charity_posts.charity_id')
            ->whereIn(
                'charity_id', 
                CharityFollowers::query()
                    ->benefactorFollowing()
                    ->select('charity_id')
            )
            ->orderByDesc('charity_posts.created_at')
            ->cursorPaginate(10);
    }
}
