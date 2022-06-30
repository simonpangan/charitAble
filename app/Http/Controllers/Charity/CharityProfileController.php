<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
