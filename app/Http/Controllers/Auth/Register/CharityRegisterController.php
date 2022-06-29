<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Categories;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityDocuments;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Charity\CharityRegisterRequest;

class CharityRegisterController extends Controller
{
    use RedirectTo, RegistersUsers;

    public function index()
    {
        return Inertia::render('Auth/CharityRegister',[
            'csrfToken' => csrf_token(),
            'charityCategories'=> Categories::all()
        ]);
    }

    public function store(CharityRegisterRequest $request)
    {
        if ($request->get('step') == 1) 
        {
            return to_route('register.charity.index');
        } 
        else if ($request->get('step') == 2) 
        {
            return to_route('register.charity.index');
        }

        $link = '';
        $charityDocumentLink = '';

        $user = $this->createUser(
            $request->only(['email', 'password'])
        );
        $id = $user->id;

        $user->createLog('You have registered to our system');

        if ($request->hasFile('file'))
        {
            $charity_logo_file_path = 'charity/logo/';
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename',$filename)
                ->where('file_type','logo')
                ->latest()
                ->first()
                ->getRawOriginal();

            Storage::move('tmp/logo/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 'charity/'.$id.'/'.'logo/'.$filename);
            //this doesn't work
            Storage::deleteDirectory('tmp/logo/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                            ->where('file_type','logo')
                            ->latest()
                            ->first()
                            ->delete();

            $link = env('APP_URL') . 'storage/charity/'.$id.'/logo'.'/'.$filename;
        }


        $documentFile = $request->only('documentFile');

        $this->createCharityWithPreferences($user, $request->except(['email', 'password']), $link);
        
        foreach($documentFile['documentFile'] as $document){
            $documentFileName = $document->getClientOriginalName();
            $temporaryDocumentFile = TemporaryFile::where('filename',$documentFileName)
                                    ->where('file_type','document')
                                    ->first()
                                    ->getRawOriginal();

            Storage::move('tmp/documents/'.$temporaryDocumentFile['folder'].'/'.$temporaryDocumentFile['filename'], 'charity/'.$id.'/'.'documents/'.$documentFileName);
            Storage::deleteDirectory('tmp/documents/'.$temporaryDocumentFile['folder']);

            TemporaryFile::findOrFail($temporaryDocumentFile['id'])->delete();
            $this->storeCharityDocuments($id,$documentFileName);
        }

        event(new Registered($user));

        $this->guard()->login($user);
        // dd($request->all());
        return redirect($this->redirectPath());
    }

    private function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
            'password' => Hash::make($data['password']),
        ]);
    }

    private function createCharityWithPreferences(User $user, array $data, $link): void
    {
         $charity = $user->charity()->create([
            'name' => $data['name'],
            'about' => $data['description'],
            'charity_email' => $data['charity_email'],
            'logo' => $link,
            'website_link' => $data['website_link'],
            'facebook_link' => $data['fb_link'],
            'twitter_link' => $data['twitter_link'],
           'instagram_link' => $data['ig_link'],
        ]);

        $charity->categories()->attach($data['categories']);
    }

    public function uploadPhoto(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
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


    public function uploadDocumentsPhoto(Request $request)
    {
        if($request->hasFile('documentFile'))
        {
            $file = $request->file('documentFile');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;


            $file->storeAs('tmp/documents/'. $folder ,$filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'file_type' => 'document'
            ]);
            return $request->hasFile('documentFile');
        }

        return $request->hasFile('documentFile');
    }

    public function storeCharityDocuments($id,$documentFileName){
        $charityDocument = new CharityDocuments();
        $charityDocument->charity_id = $id;
        $charityDocument->path = 'charity/'.$id.'/'.'documents/'. $documentFileName;
        $charityDocument->type = 'SEC or DTI';
        $charityDocument->save();
    }

}
