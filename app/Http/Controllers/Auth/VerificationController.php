<?php


namespace App\Http\Controllers\Auth;


use Inertia\Inertia;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;


class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    use RedirectTo;


    public function __construct()
    {
        $app_url = config("app.url");
        if (!empty($app_url)) {
            $schema = explode(':', $app_url)[0];
            if ($schema == 'https') {
                $this->middleware('signedhttps')->only('verify');
            } else {
                $this->middleware('signed')->only('verify');
            }
        }

        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : Inertia::render('Auth/Verify');
    }
}
