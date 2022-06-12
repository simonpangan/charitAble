<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Traits\RedirectTo;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class GoogleLoginController extends Controller
{
    use RedirectsUsers, RedirectTo;

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstWhere('email', $googleUser->email);

        try {
            throw_if(
                is_null($user), ModelNotFoundException::class, 
                'These credentials do not match our records.'
            );
        } catch (ModelNotFoundException $e) {
            return to_route('auth.index')->withErrors(
                new MessageBag(['google_login' => $e->getMessage()])
            );
        }

        Auth::login($user);

        $user->createLoginLog();

        return redirect()->intended($this->redirectPath());
    }
}
