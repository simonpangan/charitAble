<?php

namespace App\Http\Controllers\Charity;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
