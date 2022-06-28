<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\CharityPosts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Charity\CharityPostStoreRequest;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;


class CharityPostsController
{
    public function index(): Response
    {
        return Inertia::render('Charity/Post/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Post/Create',[
            'csrfToken' => csrf_token()
        ]);
    }

    public function store(CharityPostStoreRequest $request, ): RedirectResponse
    {
        // CharityPosts::create($request->validated());
        // User::create([
        //     'email' => $data['headAdminEmail'],
        //     'role_id' => Role::USERS['CHARITY_SUPER_ADMIN'],
        //     'password' => Hash::make($data['password']),
        // ]);



        $id = auth()->user()->id;
        $filename = '';
        $link = '';

        if($request->hasFile('main_content_body_image')){
            $file = $request->file('main_content_body_image');
            $filename = $file[0]->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename',$filename)
                            ->where('file_type','post-img')
                            ->latest()
                            ->first()
                            ->getRawOriginal();

            Storage::move('tmp/post/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 'public/charity/'. $id .'/'.'post/'.$filename);
            //this doesn't work
            Storage::deleteDirectory('tmp/post/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                            ->where('file_type','post-img')
                            ->latest()
                            ->first()
                            ->delete();

            $link = 'http://127.0.0.1:8000/storage/charity/' . $id . '/' .'post/' . $filename;
            }

            CharityPosts::create([
                'main_content_body' => $request['main_content_body'],
                'main_content_body_image' => $link,
                'charity_id' => $id
            ]);

            // $link = $charity_logo_file_path.$id.'/'.$filename;
        // Auth::user()->createLog("You have deleted program with id");

        return to_route('charity.profile.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityPosts::query()
            ->findOrFail($id)
            ->delete()
            
        // Auth::user()->createLog("You have deleted program with id");

        return to_route('charity.posts.index');
    }

    public function uploadPostPhoto(Request $request){

        if($request->hasFile('main_content_body_image')){
            $file = $request->file('main_content_body_image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/post/'. $folder ,$filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'file_type' => 'post-img'
            ]);

            return '200';
        }
        return '500';
}
}
