<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Charity\CharityRegisterRequest;

class CharityRegisterController extends Controller
{
    use RedirectTo, RegistersUsers;

    public function index()
    {
        return Inertia::render('Auth/CharityRegister',[
            'csrfToken' => csrf_token()
        ]);
    }

    public function store(CharityRegisterRequest $request)
    {

        $link = '';
        $user = $this->createUser(
            $request->only(['headAdminEmail', 'password'])
        );
        $id = $user->id();

        //

        $user->createLog('You have registered to our system');


        //
        if($request->hasFile('file')){
        //logo file path
        $logo_file_path = 'tmp/documents/';

        $charity_logo_file_path = 'charity/logo/';
        //$charity_document_file_path = 'charity/document/';
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $temporaryFile = TemporaryFile::where('filename',$filename)->where('file_type','logo')->first()->getRawOriginal();

        Storage::move('tmp/logo/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 'charity/'.$id.'/'.'logo/',$filename);

        //this doesn't work
        Storage::deleteDirectory($logo_file_path.$temporaryFile['folder']);
        //delete temporary
        $link = $charity_logo_file_path.$filename;
        }

        $documentFile = $request->only('documentFile');

        foreach($documentFile['documentFile'] as $document){
            $documentFileName = $document->getClientOriginalName();
            dump($temporaryDocumentFile = TemporaryFile::where('filename',$documentFileName)->where('file_type','document')->first()->getRawOriginal());
            Storage::move('tmp/documents/'.$temporaryDocumentFile['folder'].'/'.$temporaryDocumentFile['filename'], 'charity/'.$id.'/'.'documents/'. $documentFileName);        }



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
                $filename = uniqid().'-'.$file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('tmp/logo/'. $folder ,$filename);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $filename,
                    'file_type' => 'logo'
                ]);

                return '200';
            }
            return '500';
    }


    public function uploadDocumentsPhoto(Request $request){

        //Improvement try to make upload into a single folder.
            if($request->hasFile('documentFile')){
                $file = $request->file('documentFile');
                dump($file);
                $filename = uniqid().'-'.$file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;

                $file->storeAs('tmp/documents/'. $folder ,$filename);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $filename,
                    'file_type' => 'document'
                ]);
                return $file;
            }
            return $request->hasFile('documentFile');
    }
}
