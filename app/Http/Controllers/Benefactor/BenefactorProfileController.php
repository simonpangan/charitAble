<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Benefactor\BenefactorProfileRequest;

class BenefactorProfileController
{
    public function index(): Response
    {
        return Inertia::render(
            'Benefactor/Profile/Index',   
            [ 
                'charityCategories'=> Categories::all(),
                'benefactor' => Benefactor::auth()
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


        to_route('benefactor.profile.index')
            ->with('message', 'Succesfully updated your profile');
    }
}
