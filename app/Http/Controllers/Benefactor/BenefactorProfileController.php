<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Enums\CharityCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Benefactor\BenefactorProfileRequest;
use App\Models\User;

class BenefactorProfileController
{
    public function index(): Response
    {
        return Inertia::render(
            'Benefactor/Profile/Edit',   
            [ 
                'charityCategories'=> CharityCategory::getCategories()
            ]
        );
    }   

    public function update(BenefactorProfileRequest $request)
    {
        User::query()
            ->findOrFail(Auth::id())
            ->update($request->only('email'));

        Benefactor::query()
            ->findOrFail(Auth::id())
            ->update($request->except('email'));


        to_route('benefactor.profile.index');
    }
}
