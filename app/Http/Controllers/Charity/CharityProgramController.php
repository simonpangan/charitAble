<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityFollowers;
use App\Http\Requests\Charity\CharityProgramRequest;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class CharityProgramController
{
    public function index(int $id): Response
    {
        $charity =  Charity::query()
            ->findOrFail($id);

        $seeFollowOrUnfollow = false;
        $canFollow = false;

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR']) {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }

        return Inertia::render('Charity/Program/Index',[
            'programs' => CharityProgram::where(
                    'charity_id', $id
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
        return Inertia::render('Charity/Program/Create',[
            'csrfToken' => csrf_token(),
        ]);
    }

    public function store(CharityProgramRequest $request): RedirectResponse
    {
        // CharityProgram::create($request->validated());
        $link = '';
        // dd($request->input('goal'));
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename',$filename)
                            ->where('file_type','logo')
                            ->latest()
                            ->first()
                            ->getRawOriginal();

            Storage::move('tmp/program/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 'charity/'.'/'.'program/'.$filename);
            //this doesn't work
            Storage::deleteDirectory('tmp/program/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                            ->where('file_type','program-header')
                            ->latest()
                            ->first()
                            ->delete();

            //delete temporary
            $link = 'charity/'.'/'.'program/'.$filename;
            }

            $this->createProgram($request,$link);

        return to_route('charity.profile.index');
    }

    public function createProgram(CharityProgramRequest $request,$link){

        $goal_array = [];
        for($i=0; $i<count($request['goal']);$i++){
            $goal_array[] = $request['goal'][$i];
        }
        CharityProgram::create([
            'program_name' => $request['program_name'],
            'program_description' => $request['program_description'],
            'location' => 'location request',
            //'goal' => implode("-",$request['goal']),
            'goal' => $request['goal'],
            'total_donation_amount' => $request['program_donation_total'],
            'total_withdrawn_amount' => 0,
            'program_expenses' =>  $request['program_expenses'],
            'header' => $link
        ]);
    }

    public function uploadProgramPhoto(Request $request){

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/program/'. $folder ,$filename);

            return TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'file_type' => 'program-header'
            ]);
        }

        return '500';
    }

    public function show(int $id): Response
    {
        return Inertia::render(
            'Charity/Program/Show',
            [
                'program' => CharityProgram::with('charity:id,name')->findOrFail($id),
            ]
        );
    }

    public function edit(int $id): Response
    {
        return Inertia::render(
            '',
            CharityProgram::findOrFail($id)->toArray()
        );
    }

    public function update(CharityProgramRequest $request, int $id): RedirectResponse
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->update($request->validated());

        return to_route('');
    }

    public function destroy(int $id): RedirectResponse
    {
        $program = CharityProgram::findOrFail($id);
        
        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);
    
        ProgramDonation::where('charity_program_id', $id)->delete();

        $program->delete();

        return to_route('charity.program.index', Auth::id());
    }
}
