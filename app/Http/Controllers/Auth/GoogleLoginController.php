<?php

namespace App\Http\Controllers\Auth;

use App\Traits\RedirectTo;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleLoginController extends Controller
{
    use RedirectsUsers;
    use RedirectTo;

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $google = Socialite::driver('google')->user();
        $user = User::firstOrCreate(
                ['email' => $google->email],
                [
                    'firstName' => $google->user['given_name'],
                    'lastName' => $google->user['family_name'],
                    'role_id' => Role::USERS['BENEFACTOR'],
                    'email_verified_at' => Carbon::now(config('app.timezone'))
                ]
            );
        Auth::login($user);

        return redirect()->intended($this->redirectPath());
    }
}
