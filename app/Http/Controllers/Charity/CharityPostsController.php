<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityFollowers;
use App\Http\Requests\Charity\CharityPostStoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use File;


class CharityPostsController
{
    use AuthorizesRequests;

    public function index(int $id = null): Response
    {
        if (Auth::user()->role_id == Role::USERS['CHARITY_SUPER_ADMIN'] && $id == null) {
            $charityID = Auth::id();
        } elseif (Auth::user()->role_id == Role::USERS['CHARITY_SUPER_ADMIN'] && $id) {
            $charityID = $id;
        } else {
            $charityID = $id;
        }

        $charity =  Charity::query()
            ->with('categories', 'officers')
            ->findOrFail($charityID);


            $seeFollowOrUnfollow = false;
        $canFollow = false;

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR']) {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }

        return Inertia::render('Charity/Post/Index',[
            'posts'=> CharityPosts::where(
                    'charity_id', $charity->id
                )->latest()->get(),
            'charity' => $charity,
            'can' => [
                'access' => Auth::id() ==  $charity->id,
                'seeFollowOrUnfollow' =>  $seeFollowOrUnfollow,
                'follow' => $canFollow 
            ]
        ]);
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

        return to_route('charity.post.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $post = CharityPosts::findOrFail($id);

        abort_if($post->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        Auth::user()->createLog("You have deleted a post");

        $post->delete();

        return to_route('charity.post.index', [
            'id' => Auth::id()
        ]);
    }

    public function uploadPostPhoto(Request $request) 
    {
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

    public function uploadPostPhotoRevert(Request $request){
        
        try{
        $filename = $request['filename'];
        $folder = TemporaryFile::where('filename',$filename)->pluck('folder')->first();
        TemporaryFile::where('filename',$filename)->first()->delete();

         Storage::deleteDirectory('/tmp/post/'.$folder);

        return 'http://127.0.0.1:8000/storage/tmp/post/'.$folder;
        
        }catch(\Exception $e){
            return response($folder);
        }
       
    }
}
