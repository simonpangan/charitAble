<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityFollowers;
use App\Http\Requests\Charity\CharityPostStoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


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

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR'])
        {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }

        $latestFiveActivePrograms = CharityProgram::query()
            ->where('charity_id' , $id)
            ->where('is_active', true)
            ->latest()
            ->limit(5)
            ->get();


        return Inertia::render('Charity/Post/Index',[
            'posts'=> CharityPosts::where(
                    'charity_id', $charity->id
                )->latest()->get(),
            'charity' => $charity,
            'latestFiveActivePrograms' => $latestFiveActivePrograms,
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
            'csrfToken' => csrf_token(),
            'program' => CharityProgram::where('charity_id',Auth::id())->get()->toArray()
        ]);
    }

    public function store(CharityPostStoreRequest $request, ): RedirectResponse
    {
        $id = Auth::id();
        $filename = '';
        $link = null;

        if($request->hasFile('main_content_body_image')) {
            $file = $request->file('main_content_body_image');
            $filename = $file[0]->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename', $filename)
                ->where('file_type','post-img')
                ->latest()
                ->first()
                ->getRawOriginal();

            Storage::move(
                'tmp/post/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'],
                'public/charity/'.$id.'/post'.'/'.Carbon::now()->timestamp.'-'.$filename
            );
            Storage::deleteDirectory('tmp/post/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                ->where('file_type','post-img')
                ->latest()
                ->first()
                ->delete();

            $link = "/storage/charity/{$id}/post/".Carbon::now()->timestamp."-{$filename}";
        }

        CharityPosts::create([
            'main_content_body' => $request->main_content_body,
            'main_content_body_image' => $link,
            'charity_programs_id' => $request->charity_program_id
        ]);

        Auth::user()->createLog("You have created a post");

        return to_route('charity.post.index', Auth::id());
    }

    public function destroy(int $id): RedirectResponse
    {
        $post = CharityPosts::findOrFail($id);

        if (! is_null($post->main_content_body_image) &&
            $post->main_content_body_image != 'https://www.cloudways.com/blog/wp-content/uploads/OG-Banner-204.jpg'
        ) {
            unlink(substr($post->main_content_body_image, 1));
        }

        abort_if($post->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        Auth::user()->createLog("You have deleted a post");


        $post->delete();
        return to_route('charity.post.index', [
            'id' => Auth::id()
        ]);
    }

    public function uploadPostPhoto(Request $request)
    {
        if($request->hasFile('main_content_body_image'))
        {
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

    public function uploadPostPhotoRevert(Request $request)
    {
        try{
            $filename = $request['filename'];
            $folder = TemporaryFile::where('filename',$filename)->pluck('folder')->first();
            TemporaryFile::where('filename',$filename)->first()->delete();

             Storage::deleteDirectory('/tmp/post/'.$folder);

            return 200;
        }catch(\Exception $e){
            return 500;
        }
    }
}
