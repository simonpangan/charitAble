<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;


class BenefactorProfileController
{
    public function index(): Response
    {
        return Inertia::render(
            'Benefactor/Profile',   
            [ 'user' => Auth::user()->withBenefactor()->toArray() ]
        );
    }   
}
