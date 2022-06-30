<?php

namespace App\Http\Controllers\Charity;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityVolunteerPost;
use App\Models\Charity\CharityOfficers;

use Illuminate\Support\Facades\Auth;


class CharityProfileController extends Controller
{
    public function index(): Response
    {
        return Inertia::render(
            'Charity/Profile',
            [ 
                'charity' => Charity::query()
                    ->with('categories', 'officers')
                    ->find(Auth::id()),
            ],
        );
    }
}
