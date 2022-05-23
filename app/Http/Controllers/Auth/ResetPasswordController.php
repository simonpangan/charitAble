<?php

namespace App\Http\Controllers\Auth;

use App\Traits\RedirectTo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    use RedirectTo;

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return Inertia::render('Auth/Password/Reset', [
            'token' => $token, 'email' => $request->email
        ]);
    }
}
