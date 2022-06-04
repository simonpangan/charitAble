<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;
use App\Traits\RedirectTo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    use RedirectTo;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:55'],
            'lastName' => ['required', 'string', 'max:55'],
            /*
                email validation
                https://minuteoflaravel.com/validation/laravel-email-validation-be-aware-of-how-you-validate/
            */
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            //Password default validations is in the AppServiceProvider
            'password' => ['required', 'string', 'confirmed', Password::defaults()],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'lastName' => $data['lastName'],
            'firstName' => $data['firstName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'accountType' => $data['accountType'],
            'age' => $data['age'],
            'preferences' => implode(",",$data['preferences']),
            'role_id' => Role::USERS['BENEFACTOR'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showCharityRegistrationForm()
    {
        return Inertia::render('Auth/CharityRegister');
    }

    public function uploadPhoto(Request $request){
         $file = $request->file('file');
         $filename = $file->getClientOriginalName();
         $file->storeAs('/public', $filename);
    }
    

    public function showBenefactorRegistrationForm()
    {
        return Inertia::render('Auth/BenefactorRegister');
    }
}
