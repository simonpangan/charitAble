<?php

namespace App\Http\Controllers\Charity;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class CharityProfileController extends Controller
{
    public function index(): Response
    {
        return Inertia::render( 
            'Charity/Profile', 
            [ 'user' => Auth::user()->withCharity()->toArray() ]
        );
    }
}
