<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Enums\CharityCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\BenefactorRegisterRequest;
use App\Models\Benefactor;

class BenefactorRegisterController extends Controller
{
    use RedirectTo, RegistersUsers;


    public function index()
    {
        // dump(CharityCategory::cases());
        // dd(CharityCategory::getCategories());
        // dd(json_encode(CharityCategory::cases()));
        return Inertia::render('Auth/BenefactorRegister', [ 
            'charityCategories'=> CharityCategory::getCategories()
        ]);
    }

    public function store(BenefactorRegisterRequest $request)
    {
        if ($request->get('step') == 1) 
        {
            return to_route('register.benefactor.index');
        }
        else if ($request->get('step') == 2)         
        {
            return to_route('register.benefactor.index');
        }

        //if last step
        $user = $this->createUser(
            $request->only(['email', 'password']
        ));

        $user->createLog('You have registered to our system');

        $this->createBenefactor(
            $user, $request->except(['email', 'password'])
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
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'gender' => $data['gender'],
            'city' => $data['city'],
            'age' => $data['age'],
            'preferences' => implode(",",$data['preferences']),
            'account_type' => $data['accountType'],
        ]);
    }

    // public function uploadPhoto(Request $request){
    //      $file = $request->file('file');
    //      $filename = $file->getClientOriginalName();
    //      $file->storeAs('/public', $filename);
    // }
}
