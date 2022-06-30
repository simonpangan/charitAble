<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;
use App\Models\Charity\CharityPosts;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;

use App\Models\Charity\CharityOfficers;
use App\Models\Charity\CharityVolunteerPost;


class CharityProfileController extends Controller
{
    public function index(int $id = null): Response
    {
        if (Auth::user()->role_id == Role::USERS['CHARITY_SUPER_ADMIN'] && $id == null) {
            $charityID = Auth::id();
        } elseif (Auth::user()->role_id == Role::USERS['CHARITY_SUPER_ADMIN'] && $id) {
            $charityID = $id;
        } else {
            $charityID = $id;
        }

        $charity =  Charity::query()
            ->with('categories', 'officers')
            ->findOrFail($charityID);

        return Inertia::render(
            'Charity/Profile',[ 
                'charity' => $charity,
                 'can' => [
                    'access' => Auth::id() ==  $charity->id
                 ]   
            ],
        );
    }
}
