<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Traits\RedirectTo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\BenefactorRegisterRequest;
use App\Models\Categories;

    class BenefactorRegisterController extends Controller
    {
        use RedirectTo, RegistersUsers;

        public function index()
        {
            return Inertia::render('Auth/BenefactorRegister', [
                'charityCategories'=> Categories::all()
            ]);
        }

        public function store(BenefactorRegisterRequest $request)
        {
            if ($request->get('step') == 1) {
                return to_route('register.benefactor.index');
            } elseif ($request->get('step') == 2) {
                return to_route('register.benefactor.index');
            }


            //if last step
            $user = $this->createUser(
                $request->only(['email', 'password'])
            );

            $user->createLog('You have registered to our system');

            $this->createBenefactor(
                $user,
                $request->except(['email', 'password'])
            );

            event(new Registered($user));

            $this->guard()->login($user);

            return redirect($this->redirectPath());
        }

        private function createUser(array $data)
        {
            return User::create([
                'email' => $data['email'],
                'role_id' => Role::USERS['BENEFACTOR'],
                'password' => Hash::make($data['password']),
            ]);
        }

        private function createBenefactor(User $user, array $data): void
        {
            $user->benefactor()->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'city' => $data['city'],
                'birth_date' => $data['birth_date'],
                'preferences' => $data['preferences'],
            ]);
        }
    }
