<?php

namespace App\Http\Controllers\Auth\Register;

use Inertia\Inertia;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CharityRegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use App\Models\Role;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class CharityRegisterController extends Controller
{
    use RedirectTo, RegistersUsers;

    public function index()
    {
        return Inertia::render('Auth/CharityRegister', [
            'csrf' => csrf_token()
        ]);
    }

    public function store(CharityRegisterRequest $request)
    {
        
        //dd($request->all());
       
        // $this->uploadPhoto(
        //     $request->input('file')
        //  );
        // //if last step
        $link = '';
        $user = $this->createUser(
            $request->only(['headAdminEmail', 'password'])
        );

        $user->createLog('You have registered to our system');


        if($request->hasFile('file')){
        //logo file path
        $logo_file_path = 'tmp/documents/';

        //charity legit logo path
        $charity_logo_file_path = 'charity/logo/';
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $temporaryFile = TemporaryFile::where('filename',$filename)->first()->getRawOriginal();
        
        Storage::move($logo_file_path.$temporaryFile['folder'].'/'.$temporaryFile['filename'], $charity_logo_file_path.$filename);
        //copy temporary 

        Storage::deleteDirectory($logo_file_path.$temporaryFile['folder']);
        //delete temporary
        $link = $charity_logo_file_path.$filename;

        }
        $this->createCharity($user, $request->except(['headAdminEmail', 'password']), $link );
        event(new Registered($user));

        $this->guard()->login($user);
        // dd($request->all());
        return redirect($this->redirectPath());


    }


    private function createUser(array $data)
    {
        return User::create([
            'email' => $data['headAdminEmail'],
            'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
            'password' => Hash::make($data['password']),
        ]);
    }

    private function createCharity(User $user, array $data, $link): void
    {
        $user->charity()->create([
            'name' => $data['charityName'],
            'about' => $data['description'],
            'charity_email' => $data['charityEmail'],
            'logo' => $link,
            'website_link' => $data['website_link'],
            'facebook_link' => $data['fb_link'],
            'twitter_link' => $data['twitter_link'],
            'instagram_link' => $data['ig_link'],

        ]);
    }

    public function uploadPhoto(Request $request){

           if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/documents/'. $folder ,$filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }


}
