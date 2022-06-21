<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Categories;
use App\Enums\CharityCategory;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityFollowers;
use App\Models\Charity\CharityCategories;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Contracts\Pagination\CursorPaginator;


class BenefactorHomeController
{
    public function index()
    {
        return Inertia::render('Benefactor/Home',[
            'benefactor' => fn () => Benefactor::auth(),
            'posts' => $this->getCharityPostsByFollowing(),
            'randomCharity' => fn () => $this->getRandomCharity(),
            'userFollowsAtleastOneCharity' => fn () => $this->userHasFollowing(),
        ]);
    }

    private function userHasFollowing()   
    {
        $followingNumber =  CharityFollowers::where('benefactor_id', Auth::id())->count();

        return ($followingNumber > 0) ? true : false;
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

    private function getRandomCharity()
    {
        $randomCharityID = CharityCategories::query()
            ->toBase()
            ->selectRaw(" DISTINCT `charity_id`")
            ->whereNotIn(
                'charity_id', 
                CharityFollowers::query()
                    ->benefactorFollowing()
                    ->select('charity_id')
            )
            ->whereIn(
                'category_id', 
                Benefactor::auth()->preferences
            )
            ->orderByRaw('RAND()')
            ->limit(5)
            ->get()
            ->pluck('charity_id')
            ->toArray();
        
        return Charity::find($randomCharityID, ['id', 'name', 'logo']);
    }
}
